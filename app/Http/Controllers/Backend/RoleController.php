<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.role.index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        return view('backend.role.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'          => 'required',
        ]);

        Role::create($validate);

        $notification = array(
            'message'       => 'Role Created',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function edit($id)
    {
        $role = Role::find($id);

        return view('backend.role.edit', [
            'role'        => $role,
        ]);
    }


    public function update(Request $request)
    {
        $validate = $request->validate([
            'name'          => 'required',
        ]);

        Role::find($request->id)->update($validate);

        $notification = array(
            'message'       => 'Role Updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function destroy($id)
    {
        Role::find($id)->delete();

        $notification = array(
            'message'   => 'Role Deleted',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }

    public function role_permission()
    {
        $roles = Role::all();

        return view('backend.role.role_permission', [
            'roles'     => $roles,
        ]);
    }


    public function edit_role_permission($id)
    {
        $role = Role::find($id);
        $group_names = User::getPermisionGroups();

        return view('backend.role.edit_role_permission', [
            'role'          => $role,
            'group_names'   => $group_names,
        ]);
    }

    public function role_permission_update(Request $request)
    {
        $role = Role::find($request->id);
        $permission = $request->permission_id;

        if (!empty($permission)) {
            $role->syncPermissions($permission);
        }

        $notification = array(
            'message'       => 'Role Permisison Updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function delete_role_permission($id)
    {
        $role = Role::find($id);

        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }
}
