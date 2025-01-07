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

        return view('front.welcome');
    }
}
