<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function admin_logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notif = array(
            'message'       => 'Logout Successfully',
            'alert-type'    => 'success',
        );

        return redirect('/admin/logout/page')->with($notif);
    }

    public function admin_logout_page()
    {
        return view('backend.logout');
    }

    public function admin_profile()
    {
        return view('backend.profile');
    }


    public function update_info(Request $request)
    {
        $data = User::find(Auth::id());

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {

            $file = $request->file('photo');

            @unlink(public_path('/uploads/user/' . $data->photo));

            $file_name = date('YmdHi') . '.' . $file->getClientOriginalName();

            $file->move(public_path('/uploads/user/'), $file_name);

            $data['photo']  = $file_name;
        }

        $data->save();

        $notif = array(
            'message'         => 'Profile Info Updated Successfully',
            'alert-type'      => 'success',
        );

        return back()->with($notif);
    }

    public function update_password(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            if ($request->new_password !== '') {
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->new_password),
                ]);

                $notif = array(
                    'message'       => 'Password Updated',
                    'alert-type'    => 'success',
                );

                return back()->with($notif);
            }
        } else {

            $notif = array(
                'message'       => 'Old password does not match',
                'alert-type'    => 'error',
            );

            return back()->with($notif);
        }
    }

    public function admin()
    {
        $users = User::latest()->where('id', '!=', Auth::id())->get();

        return view('backend.admin', [
            'users' => $users,
        ]);
    }

    public function assign_role()
    {
        $roles = Role::all();
        $branches = Branch::latest()->get();

        return view('backend.assing_role', [
            'roles'         => $roles,
            'branches'      => $branches,
        ]);
    }


    public function assign_role_store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'role_id'   => 'required',
        ]);

        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->branch_id    = $request->branch_id;

        $user->save();

        if ($request->role_id) {
            $user->assignRole($request->role_id);
        }

        $notification = array(
            'message'       => 'Role Assigned to User',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function edit_assign_role($id)
    {
        $user       = User::find($id);
        $roles      = Role::all();

        return view('backend.edit_assign_role', [
            'user'      => $user,
            'roles'     => $roles,
        ]);
    }

    public function update_assign_role(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'role_id'   => 'required',
        ]);

        $user = User::find($request->id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);

        $user->save();

        $user->roles()->detach();
        // $user->syncRoles([]);

        if ($request->role_id) {
            $user->assignRole($request->role_id);
        }

        $notification = array(
            'message'       => 'Assigned Role Updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function delete_assign_role($id)
    {
        $user = User::find($id);

        $user->delete();

        $notification = array(
            'message'       => 'User Deleted',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }
}
