<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\team;
use App\Models\department;
use App\Models\team_static;
use DB;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class teamController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:team-list|team-create|team-edit|team-delete');
        $this->middleware('permission:team-list', ['only' => ['index']]);
        $this->middleware('permission:team-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
      
            $team = team::orderBy('id', 'asc')->get();
            return view('admin.common-page.teams.index', compact('team'))->with('i', ($request->input('page', 1) - 1) * 5);
      
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
            
            $teams = team::pluck('name', 'name')->all();
            $department = department::get();
                   
            return view('admin.common-page.teams.create', compact('teams','department'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:teams,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department' => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {


               $departmentName = department::where('id',$request->department)->first();

                $team = new Team;
                $team->name = ucwords($request->name);
                $team->email = $request->email;
                $team->slug    = Str::slug($request->name, "-");
                $team->qualification = $request->qualification;
                $team->department = $request->department;
                $team->department_name = $departmentName->department;
                $team->description = $request->description;
                $team->experience = $request->experience;
                $team->designation = $request->designation;
                $team->order = $request->order;
                $team->status = $request->status;

                $path = public_path('team/image');
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $newname = time() . rand(10, 99).'.'.$file->getClientOriginalExtension();
                    $file->move($path, $newname);
                    $team->image = $newname;
                }
                $team->save();

            return redirect()->route('teams.index')->with('success', 'Team created successfully');

       
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

            $team = team::find(dDecrypt($id));
            return view('admin.common-page.teams.show', compact('team'));

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

    public function edit($id)
    {
        try {
        
            $team = team::find(dDecrypt($id));
            $department = department::get();
            $teamStatic = team_statics::get();

            return view('admin.common-page.teams.edit', compact('team','department','teamStatic'));
      
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
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department' => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
    
        try {

               $departmentName = department::where('id',$request->department)->first();


                $team = Team::find(dDecrypt($id));
                $team->name = ucwords($request->name);
                $team->email = $request->email;
                $team->slug    = Str::slug($request->name, "-");
                $team->department = $request->department;
                $team->qualification = $request->qualification;
                $team->department_name = $departmentName->department;
                $team->experience = $request->experience;
                $team->description = $request->description;
                $team->order = $request->order;
                $team->status = $request->status;
                
                // Handle Image Upload
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                    $path = public_path('team/image');
                    $file->move($path, $newname);
                    $team->image = $newname;
                }
                $team->save(); 
    
                return redirect()->route('teams.index')->with('success', 'Team Update successfully');
        
        } catch (\Exception $e) {
            DB::rollBack();
            return view('admin.common-page.error', ['error' => 'An error occurred: ' . $e->getMessage()]);

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

           team::find(dDecrypt($id))->delete();
           return redirect()->route('teams.index')->with('success', 'Team deleted successfully');

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
