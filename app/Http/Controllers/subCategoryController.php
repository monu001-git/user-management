<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;

class subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:sub-category-list|sub-category-create|sub-category-edit|sub-category-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:sub-category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sub-category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sub-category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {

        $subCategory = subCategory::latest()->get();

        return view('sub-category.index', compact('subCategory'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = category::latest()->get();
        return view('sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'title' => 'required|array',
            'title.*' => 'required|string',
            'detail' => 'required|array',
            'detail.*' => 'required|string',
            'order' => 'required|array',
            'order.*' => 'required|integer',
            'url' => 'required|array',
            'url.*' => 'required|string',
        ]);

        $titles = $request->title;
        $details = $request->detail;
        $orders = $request->order;
        $urls = $request->url;


        $subCategoriesData = [];

        foreach ($details as $index => $detail) {
            $subCategoriesData[] = [
                'category_id' => $request->category_id,
                'status' => $request->status,
                'order' => $orders[$index],
                'title' => $titles[$index],
                'detail' => $details[$index],
                'url' => $urls[$index],
            ];
        }

        // Bulk insert all subcategories at once
        SubCategory::insert($subCategoriesData);

        return redirect()->route('sub-category.index')
            ->with('success', 'Subcategory created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(subCategory $subCategory): View
    {
        return view('sub-category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(subCategory $subCategory): View
    {
        $categories = category::latest()->paginate(5);
        return view('sub-category.edit', compact('subCategory', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subCategory $subCategory): RedirectResponse
    {
        request()->validate([
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'title' => 'required',
            'detail' => 'required',
            'order' => 'required',
        ]);

        $data = subCategory::find($request->id);
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->url = $request->url;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('sub-category.index')
            ->with('success', 'sub Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(subCategory $subCategory): RedirectResponse
    {
        $subCategory->delete();

        return redirect()->route('sub-category.index')
            ->with('success', 'sub Category deleted successfully');
    }
}
