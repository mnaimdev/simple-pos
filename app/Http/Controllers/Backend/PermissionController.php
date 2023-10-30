<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permission.index', [
            'permissions' => $permissions,
        ]);
    }

    public function create()
    {
        return view('backend.permission.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'          => 'required',
            'group_name'    => 'required',
        ]);

        Permission::create($validate);

        $notification = array(
            'message'       => 'Permission Created',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('backend.permission.edit', [
            'permission'        => $permission,
        ]);
    }


    public function update(Request $request)
    {
        $validate = $request->validate([
            'name'          => 'required',
            'group_name'    => 'required',
        ]);

        Permission::find($request->id)->update($validate);

        $notification = array(
            'message'       => 'Permission Updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function destroy($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message'   => 'Permission Deleted',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }


    function add_role_permission()
    {
        $roles = Role::all();
        $group_names = User::getPermisionGroups();

        return view('backend.permission.add_role_permission', [
            'roles'             => $roles,
            'group_names'       => $group_names,
        ]);
    }

    public function role_permission_store(Request $request)
    {

        $request->validate([
            'role_id'        => 'required',
            'permission_id'  => 'required',
        ]);

        $data = array();

        $permissions = $request->permission_id;

        foreach ($permissions as $permission) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $permission;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message'       => 'Role Permission Added',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }
}
