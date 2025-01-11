<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\content;
use App\Models\imageContent;
use App\Models\videoContent;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class contentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:content-list|content-create|content-edit|content-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:content-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:content-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:content-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        try {
            $content = content::orderBy('id', 'asc')->get();
            return view('admin.common-page.contents.index', compact('content'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        try {
            $content = content::pluck('title', 'title')->all();
            return view('admin.common-page.contents.create', compact('content'));
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        // try {
        $this->validate($request, [
            //  'name' => 'required',
            //  'email' => 'required|email|unique:users,email',
            //  'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);

        $content = new Content;
        $content->title = ucwords($request->title);
        $content->descriptions = $request->descriptions;
        $content->meta_title = $request->meta_title;
        $content->meta_description = $request->meta_description;
        $content->meta_keyword = $request->meta_keyword;
        $content->status = $request->status;
        $path = public_path('uploads/content');
        if ($request->hasFile('contentImage')) {
            $file = $request->file('contentImage');
            $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $newname);
            $content->image = $newname;
        }

        $content->save();

        $titles = $request->imageTitle ?? [];
        $alts = $request->imageAlt ?? [];
        $files = $request->multipleimage ?? [];

        foreach ($files as $index => $file) {
            if ($file) {
                $imageContent = new ImageContent();
                $imageContent->content_id = $content->id;
                $imageContent->imageTitle = $titles[$index] ?? null;
                $imageContent->imageAlt = $alts[$index] ?? null;
                $path = public_path('uploads/content/image');
                $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newName);
                $imageContent->image = $newName;
                $imageContent->save();
            }
        }


        $videoAlts  = $request->videoAlt ?? [];
        $videoTitles = $request->videoTitle ?? [];
        $videoUrls = $request->videoUrl ?? [];

        foreach ($videoUrls as $index => $videoUrl) {
            if ($videoUrl) {
                $videoContent = new VideoContent();
                $videoContent->content_id = $content->id;
                $videoContent->videoTitle = $videoTitles[$index] ?? null;
                $videoContent->videoAlt = $videoAlts[$index] ?? null;
                $videoContent->videoUrl = $videoUrl;
                $videoContent->save();
            }
        }

        return redirect()->route('contents.index')
            ->with('success', 'content created successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        try {
            $content = content::find(dDecrypt($id));

            return view('admin.common-page.contents.show', compact('content'));
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        // try {
        $content = content::find(dDecrypt($id));
        $imageContent = ImageContent::wherecontent_id(dDecrypt($id))->get();
        return view('admin.common-page.contents.edit', compact('content', 'imageContent'));
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // try {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'password' => 'same:confirm-password',
        //     'roles' => 'required'
        // ]);

        $content = content::find(dDecrypt($id));
        $content->title = ucwords($request->title);
        $content->descriptions = $request->descriptions;
        $content->meta_title = $request->meta_title;
        $content->meta_description = $request->meta_description;
        $content->meta_keyword = $request->meta_keyword;
        $content->status = $request->status;
        $path = public_path('uploads/content');
        if ($request->hasFile('contentImage')) {
            $file = $request->file('contentImage');
            $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $newname);
            $content->image = $newname;
        }

        $content->save();

        $titles = $request->imageTitle ?? [];
        $alts = $request->imageAlt ?? [];
        $files = $request->multipleimage ?? [];
        $ids = $request->id ?? [];

        foreach ($ids as $index => $id) {
            $file = $files[$index] ?? null;
            if ($id) {
                $imageContent = ImageContent::find($id);
                if ($imageContent) {
                    $imageContent->imageTitle = $titles[$index] ?? null;
                    $imageContent->imageAlt = $alts[$index] ?? null;

                    if ($file && $file->isValid()) {
                        $path = public_path('uploads/content/image');
                        $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                        $file->move($path, $newName);
                        $imageContent->image = $newName;
                    }
                    $imageContent->save();
                }
            } else {
                $imageContent = new ImageContent();
                $imageContent->content_id = $content->id;
                $imageContent->imageTitle = $titles[$index] ?? null;
                $imageContent->imageAlt = $alts[$index] ?? null;

                if ($file && $file->isValid()) {
                    $path = public_path('uploads/content/image');
                    $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                    $file->move($path, $newName);
                    $imageContent->image = $newName;
                }
                $imageContent->save();
            }
        }


        $videoAlts  = $request->videoAlt ?? [];
        $videoTitles = $request->videoTitle ?? [];
        $videoUrls = $request->videoUrl ?? [];

        foreach ($videoUrls as $index => $videoUrl) {
            if ($videoUrl) {
                $videoContent = new VideoContent();
                $videoContent->content_id = $content->id;
                $videoContent->videoTitle = $videoTitles[$index] ?? null;
                $videoContent->videoAlt = $videoAlts[$index] ?? null;
                $videoContent->videoUrl = $videoUrl;
                $videoContent->save();
            }
        }




        return redirect()->route('contents.index')
            ->with('success', 'content updated successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        // try {
        content::find(dDecrypt($id))->delete();
        return redirect()->route('contents.index')
            ->with('success', 'content deleted successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    public function deleteItem(Request $request)
    {
        // try{
        // $request->validate([
        //     'id' => 'required|exists:ImageContent,id',
        // ]);

        ImageContent::find($request->id)->delete();
        return response()->json(['message' => 'Item deleted successfully', 'status' => 200]);
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }
}
