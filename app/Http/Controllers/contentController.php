<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\content;
use App\Models\image_content;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

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
            return view('admin.common-page.contents.index', compact('content'))->with('i', ($request->input('page', 1) - 1) * 5);
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contentImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'multipleimage.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
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

            $path = public_path('uploads/banner');
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $content->banner = $newname;
            }
            $content->save();

            $titles = $request->image_title ?? [];
            $files = $request->multipleimage ?? [];

            foreach ($files as $index => $file) {
                if ($file) {
                    $imageContent = new image_content();
                    $imageContent->content_id = $content->id;
                    $imageContent->image_title = $titles[$index] ?? null;

                    $path = public_path('uploads/content/image');
                    $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                    $file->move($path, $newName);
                    $imageContent->image = $newName;
                    $imageContent->save();
                }
            }

            DB::commit();


            return redirect()->route('contents.index')->with('success', 'content created successfully');
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
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
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $content = content::find(dDecrypt($id));
            $imageContent = image_content::wherecontent_id(dDecrypt($id))->get();

            return view('admin.common-page.contents.edit', compact('content', 'imageContent'));
       
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contentImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'multipleimage.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        DB::beginTransaction();
        try {
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

            $path = public_path('uploads/banner');
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $content->banner = $newname;
            }
            $content->save();


            $titles = $request->image_title ?? [];
            $files = $request->multipleimage ?? [];
            $ids = $request->id ?? [];


            foreach ($ids as $index => $id) {
                $file = $files[$index] ?? null;
                if ($id) {
                    $imageContent = image_content::find($id);
                    if ($imageContent) {
                        $imageContent->image_title = $titles[$index] ?? null;

                        if ($file && $file->isValid()) {
                            $path = public_path('uploads/content/image');
                            $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                            $file->move($path, $newName);
                            $imageContent->image = $newName;
                        }
                        $imageContent->save();
                    }
                } else {

                    $imageContent = new image_content();
                    $imageContent->content_id = $content->id;
                    $imageContent->image_title = $titles[$index] ?? null;

                    if ($file && $file->isValid()) {
                        $path = public_path('uploads/content/image');
                        $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                        $file->move($path, $newName);
                        $imageContent->image = $newName;
                    }
                    $imageContent->save();
                }
            }

            DB::commit();


            return redirect()->route('contents.index')->with('success', 'content updated successfully');
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {

        content::find(dDecrypt($id))->delete();
        return redirect()->route('contents.index')->with('success', 'content deleted successfully');

        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('admin.common-page.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        // }
    }

    public function deleteItem(Request $request)
    {
        // try {
        $request->validate([
            'id' => 'required|exists:image_contents,id',
        ]);

        image_content::find($request->id)->delete();
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
