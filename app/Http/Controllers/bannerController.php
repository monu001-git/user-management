<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\banner;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class bannerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:banner-list|banner-create|banner-edit|banner-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:banner-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:banner-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:banner-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        try {
            $banner = banner::orderBy('id', 'asc')->get();
            return view('banners.index', compact('banner'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
            $banner = banner::pluck('title', 'title')->all();
            return view('banners.create', compact('banner'));
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
        // try {
        // $this->validate($request, [
        //     'order' => 'required',
        //     'image' => 'image'
        // ]);
        $data = new banner;
        $data->title = ucwords($request->title);
        $data->description  = $request->description;
        $data->url  = $request->url;
        $data->external  = $request->external;
        $data->order  = $request->order;
        $data->status  = $request->status;

        $path = public_path('uploads/banner');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $newname);
            $data->image = $newname;
        }

        $data->save();

        return redirect()->route('banners.index')
            ->with('success', 'banner created successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
            $banner = banner::find(dDecrypt($id));
            return view('banners.show', compact('banner'));
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
            $banner = banner::find(dDecrypt($id));
            return view('banners.edit', compact('banner'));
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
               // 'order' => 'required',
               // 'image' => 'image'
            ]);
          //  dd($request->urlType);

            $data = banner::find(dDecrypt($id));
            $data->title = ucwords($request->title);
            $data->description  = $request->description;
            $data->url  = $request->url;
            $data->external  = $request->external;
            $data->order  = $request->order;
            $data->status  = $request->status;

           // dd($request->hasFile('image'));

            $path = public_path('uploads/banner');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->image = $newname;
            }

            $data->save();

            return redirect()->route('banners.index')
                ->with('success', 'banner updated successfully');
        // } catch (\Exception $e) {
        //     \Log::error('An exception occurred: ' . $e->getMessage());
        //     return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        // } catch (\PDOException $e) {
        //     \Log::error('A PDOException occurred: ' . $e->getMessage());
        //     return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        // } catch (\Throwable $e) {
        //     \Log::error('An unexpected exception occurred: ' . $e->getMessage());
        //     return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
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
            banner::find(dDecrypt($id))->delete();
            return redirect()->route('banners.index')
                ->with('success', 'banner deleted successfully');
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An error occurred: ' . $e->getMessage()]);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'A database error occurred: ' . $e->getMessage()]);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('pages.error', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }
}
