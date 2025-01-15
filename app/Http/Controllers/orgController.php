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
use Illuminate\Http\RedirectResponse;

class orgController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:org-list|org-create|org-edit|org-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:org-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:org-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:org-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        try {

            $org = org::orderBy('id', 'asc')->get();
            return view('admin.common-page.orgs.index', compact('org'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
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
    public function create(): View
    {
        try {
            $org = org::pluck('name', 'name')->all();
            return view('admin.common-page.orgs.create', compact('org'));
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
    public function store(Request $request): RedirectResponse
    {

        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:orgs,email',
                'phone' => 'required',
                'logo' => 'required',
                'logo_title' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',

            ]);

            $data = new org;
            $data->name = ucwords($request->name);
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->instagram = $request->instagram;
            $data->instagram_title = $request->instagram_title;
            $data->facebook = $request->facebook;
            $data->facebook_title = $request->facebook_title;
            $data->twitter = $request->twitter;
            $data->twitter_title = $request->twitter_title;
            $data->logo = $request->logo;
            $data->logo_title = $request->logo_title;
            $data->meta_title = $request->meta_title;
            $data->meta_description = $request->meta_description;
            $data->meta_keyword = $request->meta_keyword;
            $path = public_path('uploads/logo');
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->logo = $newname;
            }
            $data->save();

            return redirect()->route('orgs.index')
                ->with('success', 'org created successfully');
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
    public function show($id): View
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
    public function edit($id): View
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
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:orgs,email',
                'phone' => 'required',
                'logo' => 'required',
                'logo_title' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
            ]);

            $data = org::find(dDecrypt($id));
            $data->name = ucwords($request->name);
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->instagram = $request->instagram;
            $data->instagram_title = $request->instagram_title;
            $data->facebook = $request->facebook;
            $data->facebook_title = $request->facebook_title;
            $data->twitter = $request->twitter;
            $data->Twitter_title = $request->Twitter_title;
            $data->linkedin = $request->linkedin;
            $data->linkedIn_title = $request->linkedIn_title;
            $data->logo_title = $request->logo_title;
            $data->meta_title = $request->meta_title;
            $data->meta_description = $request->meta_description;
            $data->meta_keyword = $request->meta_keyword;
            $path = public_path('uploads/logo');
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $newname = time() . rand(10, 99) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newname);
                $data->logo = $newname;
            }
            $data->save();

            return redirect()->route('orgs.index')->with('success', 'org updated successfully');
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
    public function destroy($id): RedirectResponse
    {
        try {
            org::find(dDecrypt($id))->delete();
            return redirect()->route('orgs.index')
                ->with('success', 'orgs deleted successfully');
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
