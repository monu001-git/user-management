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
            $bannerData = DB::table('banners')->whereNull('deleted_at')->where('status', 1)->orderBy('order', 'ASC')->get();
            $footerMenu = DB::table('menus')->where('status', 1)->whereNull('deleted_at')->orderBy('order', 'ASC')->get();
            $orgData = DB::table('orgs')->where('status', 1)->whereNull('deleted_at')->orderBy('order', 'ASC')->first();
            $menus = DB::table('menus')->where('status', 1)->whereNull('deleted_at')->orderBy('order', 'ASC')->get();
            $menuName = $this->getMenuTree($menus, 0);
            $view->with([
                'bannerData' => $bannerData,
                'footerMenu' => $footerMenu,
                'menuName' => $menuName,
                'orgData'=>$orgData
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

    function checkLanguage()
    {
        if (Session::get('locale') == 'hi') {
            return 'यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।';
        } else {
            return 'This link will take you to an external web site.';
        }
    }
}
