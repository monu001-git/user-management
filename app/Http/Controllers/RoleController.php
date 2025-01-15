<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        try {
            $roles = Role::orderBy('id', 'DESC')->paginate(5);
            return view('admin.common-page.roles.index', compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
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
            $permission = Permission::get();
            return view('admin.common-page.roles.create', compact('permission'));
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
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            $permissionsID = array_map(
                function ($value) {
                    return (int)$value;
                },
                $request->input('permission')
            );

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($permissionsID);

            return redirect()->route('roles.index')
                ->with('success', 'Role created successfully');
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
            $role = Role::find($id);
            $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
                ->where("role_has_permissions.role_id", $id)
                ->get();

            return view('admin.common-page.roles.show', compact('role', 'rolePermissions'));
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
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();

            return view('admin.common-page.roles.edit', compact('role', 'permission', 'rolePermissions'));
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
                'permission' => 'required',
            ]);

            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $permissionsID = array_map(
                function ($value) {
                    return (int)$value;
                },
                $request->input('permission')
            );

            $role->syncPermissions($permissionsID);

            return redirect()->route('roles.index')
                ->with('success', 'Role updated successfully');
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
            DB::table("roles")->where('id', $id)->delete();
            return redirect()->route('roles.index')
                ->with('success', 'Role deleted successfully');
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
