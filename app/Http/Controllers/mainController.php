<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


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


    public function getAllPageContent(Request $request, $slug1 = null, $slug2 = null)
    {
        // try {


            if ($slug1 != null && $slug2 != null) {
                $slug = $slug2;
            } elseif ($slug1 != null && $slug2 == null) {
                $slug = $slug1;
            } else {
                dd('slug');
            }

            //dd($slug1);
            //dd($slug2);

            $menu = DB::table('menus')->where('url', $slug1)->whereNull('deleted_at')->where('status', 1)->orderBy('order', 'ASC')->first();
            if ($menu != null) {
                $contentData = DB::table('contents')
                    ->where('id', $menu->content_id)
                    ->whereNull('deleted_at')
                    ->where('status', 1)
                    ->first();

                if ($contentData != null) {
                    $organizedData = [];

                    $image = DB::table('imagecontents')
                        ->where('content_id', $contentData->id)
                        ->whereNull('deleted_at')
                        ->get();

                    $organizedData = [
                        'image' => $image,
                    ];

                    return view('front.common-page.master-page', [
                        'content' => $contentData,
                        'organizedData' => $organizedData,
                    ]);
                }else{
                    return view('front.common-page.master-page', [
                        'message'=> 'common soon'
                    ]);
                }
            } else {
            
                return view('front.common-page.master-page', [
                    'message'=> 'common soon'
                ]);
            
            }
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
