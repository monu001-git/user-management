<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\menu;
use App\Models\gallery;
use App\Models\gallery_detail;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class galleryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:gallery-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        try {
            $gallery = gallery::orderBy('id', 'asc')->get();

            return view('admin.common-page.gallery.index', compact('gallery'))
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
            $gallery = gallery::pluck('name', 'name')->all();
            return view('admin.common-page.gallery.create', compact('gallery'));
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
        try {
            $this->validate($request, [
                // 'name' => 'required',
                // 'email' => 'required|email|unique:users,email',
                // 'password' => 'required|same:confirm-password',
                // 'roles' => 'required'
            ]);

            //dd($request->all());
            $data = new gallery();
            DB::beginTransaction();

            try {
                $data->name = ucwords($request->name);
                $data->file_type = $request->file_type;
                $data->order = $request->order;
                $data->status = $request->status;
                $data->save();

                $titles = $request->title ?? [];
                $alts = $request->alt ?? [];
                $files = $request->file ?? [];

                foreach ($files as $index => $file) {
                    if ($file) {
                        $gallerydetail = new gallery_detail();
                        $gallerydetail->gallery_id = $data->id;
                        $gallerydetail->title = $titles[$index] ?? null;
                        $gallerydetail->alt = $alts[$index] ?? null;

                        if ($request->file_type == 'i') {
                            if ($file && $file->isValid()) {
                                $path = public_path('uploads/content/image');
                                $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                                $file->move($path, $newName);
                                $gallerydetail->file = $newName;
                            }
                        } else {
                            $gallerydetail->file = $files[$index] ?? null;
                        }

                        $gallerydetail->save();
                    }
                }

                DB::commit();
                return redirect()->route('gallery.index')
                    ->with('success', 'gallery created successfully');
            } catch (\Exception $e) {
                DB::rollBack();
                return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
            }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        try {
            //  $menu = menu::find(dDecrypt($id));

            return view('admin.common-page.gallery.show', compact('menu'));
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
        try {
            $gallery = gallery::find(dDecrypt($id));
            $gallerydetail = gallery_detail::wheregallery_id(dDecrypt($id))->get();

            return view('admin.common-page.gallery.edit', compact('gallery', 'gallerydetail'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // try {
        $this->validate($request, [
            //  'name' => 'required',
            //  'email' => 'required|email|unique:users,email,' . $id,
            //  'password' => 'same:confirm-password',
            //  'roles' => 'required'
        ]);

        $data = gallery::find(dDecrypt($id));
        $data->name = ucwords($request->name);
        $data->file_type = $request->file_type;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        $titles = $request->title ?? [];
        $alts = $request->alt ?? [];
        $files = $request->file ?? [];
        $ids = $request->id ?? [];


        foreach ($ids as $index => $id) {
            $file = $files[$index] ?? null;
            if ($id) {
                $gallerydetail = gallery_detail::find($id);
                if ($gallerydetail) {
                    $gallerydetail->gallery_id = $data->id;
                    $gallerydetail->title = $titles[$index] ?? null;
                    $gallerydetail->alt = $alts[$index] ?? null;

                    if ($request->file_type == 'i') {
                        if ($file && $file->isValid()) {
                            $path = public_path('uploads/content/image');
                            $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                            $file->move($path, $newName);
                            $gallerydetail->file = $newName;
                        }
                    } else {
                        $gallerydetail->file = $files[$index] ?? null;
                    }
                    $gallerydetail->save();
                }
            } else {
                $gallerydetail = new gallery_detail();
                $gallerydetail->gallery_id = $data->id;
                $gallerydetail->title = $titles[$index] ?? null;
                $gallerydetail->alt = $alts[$index] ?? null;

                if ($request->file_type == 'i') {
                    $path = public_path('uploads/content/image');
                    $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                    $file->move($path, $newName);
                    $gallerydetail->file = $newName;
                } else {
                    $gallerydetail->file = $files[$index] ?? null;
                }

                $gallerydetail->save();
            }
        }
        DB::commit();
        return redirect()->route('gallery.index')
            ->with('success', 'gallery created successfully');
        //     } catch (\Exception $e) {
        //         DB::rollBack();
        //         return view('error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        //     }


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
        try {

            gallery::find(dDecrypt($id))->delete();
            return redirect()->route('gallery.index')
                ->with('success', 'menu deleted successfully');
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


    public function deleteItem(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:gallerydetails,id',
            ]);

            $item = gallery_detail::find($request->id);
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully', 'status' => 200]);
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
}
