<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\appoinment_book;
use DB;
use Illuminate\Support\Facades\Validator;

class appointmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:appointment-list|appointment-edit|appointment-delete');
        $this->middleware('permission:appointment-list', ['only' => ['index']]);
        $this->middleware('permission:appointment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:appointment-delete', ['only' => ['destroy']]);
    }

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $appointment = appoinment_book::orderBy('id', 'desc')->get();
            return view('admin.common-page.appointment.index', compact('appointment'))->with('i', ($request->input('page', 1) - 1) * 5);
      
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
            $appointment = appoinment_book::find(dDecrypt($id));
            $bookapp = DB::table('departments')->whereNull('deleted_at')->get();

            return view('admin.common-page.appointment.edit', compact('appointment','bookapp'));
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i',
                'phone' => 'required|digits:10', 
                'age' => 'required|integer',  
                'gender' => 'required|in:male,female,other',  
                'department' => 'required|string|max:255',
                'date' => 'required|date', 
                'doctor'=>'required' 
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $doctor = DB::table('teams')->where('id',$request->doctor)->whereNull('deleted_at')->where('status', 1)->first('email');
            $emaildoctor = $doctor->email;

       
            $data = appoinment_book::find(dDecrypt($id));
            $data->name = ucwords($request->name);
            $data->email  = $request->email;
            $data->phone  = $request->phone;
            $data->age  = $request->age;
            $data->gender  = $request->gender;
            $data->department  = $request->department;
            $data->doctor  = $request->doctor;
            $data->doctor_email  = $emaildoctor;
            $data->date  = $request->date;
            $data->save();
    
            return redirect()->route('appointments.index') ->with('success', 'appointment updated successfully');
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

    public function destroy($id)
    {
        try {
      
            appoinment_book::find(dDecrypt($id))->delete();
            return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
      
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

    public function doctorList(Request $request )
    {

        try {

          $doctor = DB::table('teams')->where('department',$request->id)->whereNull('deleted_at')->where('status', 1)->get();
   
          return response()->json([
            'message' => 'Doctor Value Fetch  Successfully',
            'doctor' => $doctor 
          ], 200);

        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return response()->json(['error' => 'A database error occurred: ' . $e->getMessage()], 500);
        } catch (\Throwable $e) {
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }
    }

}
