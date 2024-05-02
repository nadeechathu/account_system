<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Gate;

class RoleController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('role_or_permission:Role access|Role create|Role edit|Role delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Role create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Role edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Role delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $role= Role::latest()->get();
        return view('setting.role.index',['roles'=>$role]);
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('setting.role.new',['permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $role = Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->withSuccess('Role created !!!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        $permission = Permission::get();
        $role->permissions;
        return view('setting.role.edit',['role'=>$role,'permissions' => $permission]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->withSuccess('Role updated !!!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->withSuccess('Role deleted !!!');
    }

}
