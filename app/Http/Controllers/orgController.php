<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\org;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class orgController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:org-list|org-create|org-edit|org-delete');
        $this->middleware('permission:org-list', ['only' => ['index']]);
        $this->middleware('permission:org-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:org-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:org-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $org = org::orderBy('id', 'asc')->get();
            return view('admin.common-page.orgs.index', compact('org'))->with('i', ($request->input('page', 1) - 1) * 5);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $org = org::pluck('name', 'name')->all();
           
            if (!isset($org) || empty($org)) {
                return view('admin.common-page.orgs.create', compact('org'));
            } else {
                return redirect()->route('orgs.index')->with('success', 'You are allowed to create only one record.');
            }
           
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:orgs,name',
                'email' => 'required|email|max:255|unique:orgs,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
                'header_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'footer_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                "middle_image"=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                "favicon"=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'meta_title' => 'required|max:255',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
               // "report_download" => 'mimes:pdf|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = new org;
            $data->name = ucwords($request->name);
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->instagram = $request->instagram;
            $data->instagram_title = $request->instagram_title;
            $data->facebook = $request->facebook;
            $data->about = $request->about;
            $data->address = $request->address;
            $data->facebook_title = $request->facebook_title;
            $data->youtube = $request->youtube;
            $data->youtube_title = $request->youtube_title;
            $data->meta_title = $request->meta_title;
            $data->meta_description = $request->meta_description;
            $data->meta_keyword = $request->meta_keyword;
            $data->header_logo_title = $request->header_logo_title;
            $data->footer_logo_title = $request->footer_logo_title;
            $data->favicon_title = $request->favicon_title;
            

            $path = public_path('uploads/logo/headerlogo');
            if ($request->hasFile('header_logo')) {
                $file = $request->file('header_logo');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->header_logo = $newname;
            }

            $path = public_path('uploads/logo/footerlogo');
            if ($request->hasFile('footer_logo')) {
                $file = $request->file('footer_logo');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->footer_logo = $newname;
            }

            $path = public_path('uploads/logo/favicon');
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->favicon = $newname;
            }

            $data->number_count1 = $request->number_count1;
            $data->text_count1 = $request->text_count1;
            $data->unit_count1 = $request->unit_count1;
            
            $data->number_count2 = $request->number_count2;
            $data->text_count2 = $request->text_count2;
            $data->unit_count2 = $request->unit_count2;

            $data->number_count3 = $request->number_count3;
            $data->text_count3 = $request->text_count3;
            $data->unit_count3 = $request->unit_count3;

            $data->number_count4 = $request->number_count4;
            $data->text_count4 = $request->text_count4;
            $data->unit_count4 = $request->unit_count4;

            $data->count_phone = $request->count_phone; 
            $data->count_heading = $request->count_heading; 

            $data->specialities_title = $request->specialities_title;
            $data->specialities_heading  = $request->specialities_heading ;
            $data->specialities_description1 = $request->specialities_description1;
            $data->specialities_description2 = $request->specialities_description2;
            $data->specialities_phone = $request->specialities_phone;

            $data->team_title = $request->team_title;
            $data->team_heading  = $request->team_heading;
            $data->team_description1 = $request->team_description1;
            $data->team_description2 = $request->team_description2;
            $data->team_phone = $request->team_phone;

            $data->news_title = $request->news_title;
            $data->news_heading  = $request->news_heading ;
            $data->news_description = $request->news_description;

            
            $data->map = $request->map;
     
            $data->some_point = $request->some_point;
            $path = public_path('uploads/middleimage');
            if ($request->hasFile('middle_image')) {
                $file = $request->file('middle_image');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->middle_image = $newname;
            }

        
            $data->testimonial_number = $request->testimonial_number;
            $data->testimonial_title = $request->testimonial_title;
            $data->testimonial_heading = $request->testimonial_heading;

            $data->whatsApp = $request->whatsApp;
            $data->report_download = $request->report_download;
         
            $data->head_script = $request->head_script;
            $data->body_script = $request->body_script;
         
            
            $path = public_path('uploads/commonBanner');
            if ($request->hasFile('common_banner')) {
                $file = $request->file('common_banner');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->common_banner = $newname;
            }


            $data->save();

            return redirect()->route('orgs.index')->with('success', 'Organization Structure Created Successfully');

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $org = org::find(dDecrypt($id));
            return view('admin.common-page.orgs.show', compact('org'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $org = org::find(dDecrypt($id));
            return view('admin.common-page.orgs.edit', compact('org'));
            
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
                'header_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'footer_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                "middle_image"=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                "favicon"=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
               // "report_download" => 'mimes:pdf|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = org::find(dDecrypt($id));
            $data->name = ucwords($request->name);
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->instagram = $request->instagram;
            $data->instagram_title = $request->instagram_title;
            $data->facebook = $request->facebook;
            $data->about = $request->about;
            $data->address = $request->address;
            $data->facebook_title = $request->facebook_title;
            $data->youtube = $request->youtube;
            $data->youtube_title = $request->youtube_title;
            $data->meta_title = $request->meta_title;
            $data->meta_description = $request->meta_description;
            $data->meta_keyword = $request->meta_keyword;
            $data->header_logo_title = $request->header_logo_title;
            $data->footer_logo_title = $request->footer_logo_title;
            $data->favicon_title = $request->favicon_title;
            

            $path = public_path('uploads/logo/headerlogo');
            if ($request->hasFile('header_logo')) {
                $file = $request->file('header_logo');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->header_logo = $newname;
            }

            $path = public_path('uploads/logo/footerlogo');
            if ($request->hasFile('footer_logo')) {
                $file = $request->file('footer_logo');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->footer_logo = $newname;
            }

            $path = public_path('uploads/logo/favicon');
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->favicon = $newname;
            }


            $data->number_count1 = $request->number_count1;
            $data->text_count1 = $request->text_count1;
            $data->unit_count1 = $request->unit_count1;
            
            $data->number_count2 = $request->number_count2;
            $data->text_count2 = $request->text_count2;
            $data->unit_count2 = $request->unit_count2;

            $data->number_count3 = $request->number_count3;
            $data->text_count3 = $request->text_count3;
            $data->unit_count3 = $request->unit_count3;

            $data->number_count4 = $request->number_count4;
            $data->text_count4 = $request->text_count4;
            $data->unit_count4 = $request->unit_count4;

            $data->count_phone = $request->count_phone; 
            $data->count_heading = $request->count_heading; 


            $data->specialities_title = $request->specialities_title;
            $data->specialities_heading  = $request->specialities_heading ;
            $data->specialities_description1 = $request->specialities_description1;
            $data->specialities_description2 = $request->specialities_description2;
            $data->specialities_phone = $request->specialities_phone;

            $data->team_title = $request->team_title;
            $data->team_heading  = $request->team_heading;
            $data->team_description1 = $request->team_description1;
            $data->team_description2 = $request->team_description2;
            $data->team_phone = $request->team_phone;

            $data->news_title = $request->news_title;
            $data->news_heading  = $request->news_heading ;
            $data->news_description = $request->news_description;

            $data->map = $request->map;


            $data->some_point = $request->some_point;
            $path = public_path('uploads/middleimage');
            if ($request->hasFile('middle_image')) {
                $file = $request->file('middle_image');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->middle_image = $newname;
            }
            
            $data->testimonial_number = $request->testimonial_number;
            $data->testimonial_title = $request->testimonial_title;
            $data->testimonial_heading = $request->testimonial_heading;

            $data->whatsApp = $request->whatsApp;
            $data->report_download = $request->report_download;

            $data->head_script = $request->head_script;
            $data->body_script = $request->body_script;

            $path = public_path('uploads/commonBanner');
            if ($request->hasFile('common_banner')) {
                $file = $request->file('common_banner');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->common_banner = $newname;
            }

         
            $data->save();

            return redirect()->route('orgs.index')->with('success', 'Organization Structure updated successfully');
      
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            org::find(dDecrypt($id))->delete();
            return redirect()->route('orgs.index')
                ->with('success', 'Organization Structure record deleted successfully');
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
