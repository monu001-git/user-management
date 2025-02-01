<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\gallery;
use App\Models\galleryEntry;
use DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class galleryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete');
        $this->middleware('permission:gallery-list', ['only' => ['index']]);
        $this->middleware('permission:gallery-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $gallery = gallery::orderBy('id', 'asc')->get();
            return view('admin.common-page.gallery.index', compact('gallery'))->with('i', ($request->input('page', 1) - 1) * 5);
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
    public function create()
    {
        try {

            $gallery = gallery::pluck('name', 'name')->all();
            return view('admin.common-page.gallery.create', compact('gallery'));
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
            'name' => 'required',
            'file_type' => 'required',
            'order' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $data = new gallery;
            $data->name = ucwords($request->name);
            $data->file_type = $request->file_type;
            $data->order = $request->order;
            $data->status = $request->status;
            $data->section = $request->section;

            $data->save();


            $titles = $request->title ?? [];
            $urls = $request->url ?? [];
            $images1 = $request->image1 ?? [];
            $images2 = $request->image2 ?? [];

            foreach ($titles as $index => $title) {
                if ($title) {
                    $gallerydetail = new galleryEntry();
                    $gallerydetail->gallery_id = $data->id;
                    $gallerydetail->title = $title;

                    $file = $request->file_type == 'i'  ? ($images1[$index] ?? null) : ($images2[$index] ?? null);

                    if ($file && $file->isValid()) {
                        $path = public_path('uploads/content/image');
                        $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                        $file->move($path, $newName);
                        $gallerydetail->image = $newName;
                    }

                    if ($request->file_type != 'i') {
                        $gallerydetail->file = $urls[$index] ?? null;
                    }

                    $gallerydetail->save();
                }
            }

            DB::commit();

            return redirect()->route('gallery.index')->with('success', 'gallery created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
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
    public function show($id)
    {
        try {
            $gallery = gallery::orderBy('id', 'asc')->get();

            return view('admin.common-page.gallery.show', compact('gallery'));
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

            $gallery = gallery::find(dDecrypt($id));
            $gallerydetail = galleryEntry::wheregallery_id(dDecrypt($id))->get();

            return view('admin.common-page.gallery.edit', compact('gallery', 'gallerydetail'));
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
            'name' => 'required',
            'file_type' => 'required',
            'order' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
        $data = gallery::find(dDecrypt($id));
        $data->name = ucwords($request->name);
        $data->file_type = $request->file_type;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->section = $request->section;

        $data->save();


        $titles = $request->title ?? [];
        $urls = $request->url ?? [];
        $images1 = $request->image1 ?? [];
        $images2 = $request->image2 ?? [];
        $ids = $request->id ?? [];

        foreach ($ids as $index => $id) {
            $file = $files[$index] ?? null;
            if ($id) {

                $gallerydetail = galleryEntry::find($id);
                $gallerydetail->gallery_id = $data->id;
                $gallerydetail->title = $titles[$index] ?? null;

                $file = $request->file_type == 'i'  ? ($images1[$index] ?? null) : ($images2[$index] ?? null);

                if ($file && $file->isValid()) {
                    $path = public_path('uploads/content/image');
                    $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                    $file->move($path, $newName);
                    $gallerydetail->image = $newName;
                }

                if ($request->file_type != 'i') {
                    $gallerydetail->file = $urls[$index] ?? null;
                }

                $gallerydetail->save();
            } else {

                $gallerydetail = new galleryEntry();
                $gallerydetail->gallery_id = $data->id;
                $gallerydetail->title = $titles[$index] ?? null;

                $file = $request->file_type == 'i'  ? ($images1[$index] ?? null) : ($images2[$index] ?? null);

                if ($file && $file->isValid()) {
                    $path = public_path('uploads/content/image');
                    $newName = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                    $file->move($path, $newName);
                    $gallerydetail->image = $newName;
                }

                if ($request->file_type != 'i') {
                    $gallerydetail->file = $urls[$index] ?? null;
                }

                $gallerydetail->save();
            }
        }

        DB::commit();


        return redirect()->route('gallery.index')->with('success', 'gallery created successfully');
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
        try {

            gallery::find(dDecrypt($id))->delete();
            return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully');
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


    public function deleteItem(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:gallery_entries,id',
            ]);

            $item = galleryEntry::find($request->id);
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully', 'status' => 200]);
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
}
