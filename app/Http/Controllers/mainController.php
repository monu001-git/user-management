<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\appoinment_book;
use Illuminate\Support\Facades\Validator;

class mainController extends Controller
{
    public function home()
    {
        try {
      
            return view('front.home');
      
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


    public function contactUs(){
        return view('front.common-page.contact-us');
    }

    public function getAllPageContent(Request $request, $slug1 = null, $slug2 = null)
    {
        try {

        if ($slug1 != null && $slug2 != null) {
            $slug = $slug2;
            $parent_menu = DB::table('menus')->where('url', $slug1)->whereNull('deleted_at')->where('status', 1)->orderBy('order', 'ASC')->first();
            $menu = DB::table('menus')->where('url', $slug)->whereparent_id($parent_menu->id)->whereNull('deleted_at')->where('status', 1)->orderBy('order', 'ASC')->first();
       
        } elseif ($slug1 != null && $slug2 == null) {
            $slug = $slug1;
            $parent_menu = null;
            $menu = DB::table('menus')->where('url', $slug)->whereNull('deleted_at')->where('status', 1)->orderBy('order', 'ASC')->first();
        } else {

            return view('front.common-page.master-page', [
                'message' => 'page common soon.........',
                'menu' => $menu
            ]);
        }


        if ($menu != null) {
            $contentData = DB::table('contents')
                ->where('id', $menu->content_id)
                ->whereNull('deleted_at')
                ->where('status', 1)
                ->first();


            if ($contentData != null) {
                $organizedData = [];

                    $image = DB::table('galleries')
                       ->select('galleries.*', 'gallery_entries.*')
                       ->join('gallery_entries', 'galleries.id', '=', 'gallery_entries.gallery_id')
                       ->where('galleries.section', 3)
                       ->whereNull('galleries.deleted_at')
                       ->whereNull('gallery_entries.deleted_at')
                       ->get();

                    $team = DB::table('teams')
                        ->whereNull('deleted_at')
                        ->get();

                    $certificate = DB::table('galleries')
                        ->select('galleries.*', 'gallery_entries.*')
                        ->join('gallery_entries', 'galleries.id', '=', 'gallery_entries.gallery_id')
                        ->where('galleries.section', 1)
                        ->whereNull('galleries.deleted_at')
                        ->whereNull('gallery_entries.deleted_at')
                        ->get();


                    $faq = DB::table('faqs')
                        ->whereNull('deleted_at')
                        ->get();


                    $organizedData = [
                        'image' => $image,
                        'team' => $team,
                        'certificate' => $certificate,
                        'faq' => $faq
                    ];

          
                return view('front.common-page.master-page', [
                    'content' => $contentData,
                    'organizedData' => $organizedData,
                    'menu' => $menu,
                    'parent_menu'=>$parent_menu
                ]);
            } else {
                return view('front.common-page.master-page', [
                    'message' => 'page common soon.........',
                    'menu' => $menu,
                    'parent_menu'=>$parent_menu                    
                ]);
            }
        } else {

            dd('menu not match ');
            return view('front.common-page.master-page', [
                'message' => 'not Found'
            ]);
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



    public function appoinment_book(Request $request)
    {

        try {

        $validator = Validator::make($request->all(), [
            // 'name' => 'required|unique:banners,title',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new appoinment_book;
        $data->name = ucwords($request->name);
        $data->email  = $request->email;
        $data->phone  = $request->phone;
        $data->age  = $request->age;
        $data->gender  = $request->gender;
        $data->department  = $request->department;
        $data->date  = $request->date;

        $data->save();

        return redirect('/')->with('success', 'Appoinment book created successfully');

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
