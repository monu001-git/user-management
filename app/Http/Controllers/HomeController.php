<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\log;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
      
            return view('admin.home');
      
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

    public function logIndex(){

        try{
 
           $log = log::orderBy('id', 'desc')->get();  
           return view('admin.common-page.logs.index',['log'=>$log]);
     
     
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
