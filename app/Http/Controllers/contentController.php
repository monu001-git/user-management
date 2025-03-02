<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\content;
use App\Models\image_content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class contentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:content-list|content-create|content-edit|content-delete');
        $this->middleware('permission:content-list', ['only' => ['index']]);
        $this->middleware('permission:content-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:content-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:content-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $content = content::orderBy('id', 'desc')->get();
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
    public function create()
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
            'title'            => 'required|string|max:255',
            'meta_title'       => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keyword'     => 'required|string',
            'banner'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
        $content                   = new Content;
        $content->title            = ucwords($request->title);
        $content->descriptions     = $request->descriptions;
        $content->meta_title       = $request->meta_title;
        $content->meta_description = $request->meta_description;
        $content->meta_keyword     = $request->meta_keyword;
        $content->status           = $request->status;
        $content->descriptions2    = $request->descriptions2;
        $content->descriptions3    = $request->descriptions3;
        $content->team             = $request->team;
        $content->certificate      = $request->certificate;
        $content->image_content    = $request->image_content;
        $content->faq              = $request->faq;
        $content->left_right       = $request->left_right;
        $content->center_content   = $request->center_content;
        $content->right_left       = $request->right_left;
        $content->count       = $request->count;

        $path = public_path('uploads/content');
        if ($request->hasFile('image')) {
            $file    = $request->file('image');
            $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $newname);
            $content->image = $newname;
        }

        $path = public_path('uploads/content');
        if ($request->hasFile('image2')) {
            $file    = $request->file('image2');
            $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $newname);
            $content->image2 = $newname;
        }

        $path = public_path('uploads/banner');
        if ($request->hasFile('banner')) {
            $file    = $request->file('banner');
            $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $newname);
            $content->banner = $newname;
        }
        $content->save();

        return redirect()->route('contents.index')->with('success', 'Content created successfully');
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

            $content      = content::find(dDecrypt($id));

            return view('admin.common-page.contents.edit', compact('content'));

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
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'title'            => 'required|string|max:255',
            'meta_title'       => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keyword'     => 'required|string',
            'banner'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $content                   = content::find(dDecrypt($id));
            $content->title            = ucwords($request->title);
            $content->descriptions     = $request->descriptions;
            $content->meta_title       = $request->meta_title;
            $content->meta_description = $request->meta_description;
            $content->meta_keyword     = $request->meta_keyword;
            $content->status           = $request->status;
            $content->descriptions2    = $request->descriptions2;
            $content->descriptions3    = $request->descriptions3;
            $content->team             = $request->team;
            $content->certificate      = $request->certificate;
            $content->image_content    = $request->image_content;
            $content->faq              = $request->faq;
            $content->left_right       = $request->left_right;
            $content->center_content   = $request->center_content;
            $content->right_left       = $request->right_left;
            $content->count            = $request->count;

            $path = public_path('uploads/content');
            if ($request->hasFile('image')) {
                $file    = $request->file('image');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $content->image = $newname;
            }

            $path = public_path('uploads/content');
            if ($request->hasFile('image2')) {
                $file    = $request->file('image2');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $content->image2 = $newname;
            }

            $path = public_path('uploads/banner');
            if ($request->hasFile('banner')) {
                $file    = $request->file('banner');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $content->banner = $newname;
            }
            $content->save();

            return redirect()->route('contents.index')->with('success', 'Content updated successfully');
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

        content::find(dDecrypt($id))->delete();
        return redirect()->route('contents.index')->with('success', 'Content deleted successfully');

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
