<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class commonController extends Controller
{
    function StatusChange($status = null, $id = null, $db = null)
    {
        //dd($status,dDecrypt($id),$db);
        try {
            if ($status == '0') {
                DB::table($db)->where('id', dDecrypt($id))->update(['status' => 1]);
            } else {
                DB::table($db)->where('id', dDecrypt($id))->update(['status' => 0]);
            }
            return back()->with('status', 'Status Changed Successfully');
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


   
}
