<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App, Route, DB, Session;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Call Helper

class CommonComposer
{
    protected $request;

    /**
     * Create a new common composer.
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        try {

            
            $galleryDatarecord1 = DB::table('galleries')->where('section','1')->whereNull('deleted_at')->where('status', 1)->first();
           
            if ($galleryDatarecord1 != null) {
                $gallerydetailData = DB::table('gallery_entries')
                    ->where('gallery_id', $galleryDatarecord1->id)
                    ->whereNull('deleted_at')
                    ->get();
                $galleryDataCar = [
                    'galleryData' => $galleryDatarecord1,
                    'gallerydetailData' => $gallerydetailData,
                ];
            } else {
                $galleryDataCar = [
                    
                ];
            }
     

            $galleryDatarecord2 = DB::table('galleries')->where('section','2')->whereNull('deleted_at')->where('status', 1)->first();
            if ($galleryDatarecord2 != null) {
                $gallerydetailData = DB::table('gallery_entries')
                    ->where('gallery_id', $galleryDatarecord2->id)
                    ->whereNull('deleted_at')
                    ->get();

                $galleryDataNews = [
                    'galleryData' => $galleryDatarecord2,
                    'gallerydetailData' => $gallerydetailData,
                ];
            } else {
                $galleryDataNews = [
                    
                ];
            }

            $galleryDatarecord3 = DB::table('galleries')->where('section', '3')->whereNull('deleted_at')->where('status', 1)->first();
            if ($galleryDatarecord3 != null) {
                $gallerydetailData = DB::table('gallery_entries')
                    ->where('gallery_id', $galleryDatarecord3->id)
                    ->whereNull('deleted_at')
                    ->get();

                $galleryDataOth = [
                    'galleryData' => $galleryDatarecord3,
                    'gallerydetailData' => $gallerydetailData,
                ];
            } else {
                $galleryDataOth = [
                    
                ];
            }

            $galleryDatarecord4 = DB::table('galleries')->where('section','4')->whereNull('deleted_at')->where('status', 1)->first();
            if ($galleryDatarecord4 != null) {
                $gallerydetailData = DB::table('gallery_entries')
                    ->where('gallery_id', $galleryDatarecord4->id)
                    ->whereNull('deleted_at')
                    ->get();

                $galleryDataTopImage = [
                    'galleryData' => $galleryDatarecord4,
                    'gallerydetailData' => $gallerydetailData,
                ];
            } else {
                $galleryDataTopImage = [
                    
                ];
            }

            $bannerData = DB::table('banners')->whereNull('deleted_at')->where('status', 1)->orderBy('order','ASC')->get();
            $teamData = DB::table('teams')->whereNull('deleted_at')->where('status', 1)->orderBy('order', 'ASC')->get();
            $footerMenu = DB::table('menus')->whereIn('menu_place', [2,3])->where('status', 1)->whereNull('deleted_at')->orderBy('order','ASC')->get();   
            $orgData = DB::table('orgs')->whereNull('deleted_at')->orderBy('created_at', 'desc') ->first();
            $menus = DB::table('menus')->whereIn('menu_place', [1,3])->where('status', 1)->whereNull('deleted_at')->orderBy('order', 'ASC')->get();
            $specialitieData = DB::table('specialities')->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();

            $headerMenu = $this->getMenuTree($menus, 0);

            $view->with([
                'bannerData' => $bannerData,
                'footerMenu' => $footerMenu,
                'headerMenu' => $headerMenu,
                'orgData' => $orgData,
                'teamData' => $teamData,
                'galleryDataCar' => $galleryDataCar,
                'galleryDataNews' => $galleryDataNews,
                'galleryDataTopImage'=>$galleryDataTopImage,
                'specialitieData'=>$specialitieData
            ]);
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

    function getMenuTree($menus, $parentId)
    {
        $branch = array();
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parentId) {
                $children = $this->getMenuTree($menus, $menu->id);
                if ($children) {
                    $menu->children = $children;
                }
                $branch[] = $menu;
            }
        }
        return $branch;
    }
}
