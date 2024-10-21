<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subCategory;

class mainController extends Controller
{
    public function home()
    {
        $data = Category::get();

        $items = [];
        foreach ($data as $category) {
            $subCategories = SubCategory::where('category_id', $category->id)->orderBy('id', 'asc')->get();
            $items[$category->name] = $subCategories;
        }

        return view('welcome', compact('items'));
    }
}
