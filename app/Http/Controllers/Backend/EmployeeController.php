<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function employee()
    {
        $employees = Employee::all();

        return view('backend.employee.index', [
            'employees'     => $employees,
        ]);
    }

    public function create()
    {
        return view('backend.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|unique:employees',
            'phone'             => 'required|max:255',
            'address'           => 'required|string|max:255',
            'country'           => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'salary'            => 'required|integer|max:255',
            'experience'        => 'required|integer|max:255',
            'vacation'          => 'required|string|max:255',
            'image'             => 'required|mimes:jpg,png',

        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $file_name = hexdec(uniqid()) . '.' . $extension;
        Image::make($image)->save(public_path('/uploads/employee/' . $file_name));


        Employee::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'address'               => $request->address,
            'country'               => $request->country,
            'city'                  => $request->city,
            'salary'                => $request->salary,
            'experience'            => $request->experience,
            'vacation'              => $request->vacation,
            'image'                 => $file_name,
            'created_at'            => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Employee info added',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function show($id)
    {
        $employee_info  = Employee::find($id);
        return view('backend.employee.view', [
            'employee_info' => $employee_info,
        ]);
    }

    public function edit($id)
    {

        $employee_info = Employee::find($id);

        return view('backend.employee.edit', [
            'employee_info' => $employee_info,
        ]);
    }

    public function update(Request $request)
    {


        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|unique:employees,email,' . $request->id,
            'phone'             => 'required|max:255',
            'address'           => 'required|string|max:255',
            'country'           => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'salary'            => 'required|integer|max:255',
            'experience'        => 'required|integer|max:255',
            'vacation'          => 'required|string|max:255',
            'image'             => 'mimes:jpg,png',
        ]);

        if ($request->image == '') {

            Employee::find($request->id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'phone'                 => $request->phone,
                'address'               => $request->address,
                'country'               => $request->country,
                'city'                  => $request->city,
                'salary'                => $request->salary,
                'experience'            => $request->experience,
                'vacation'              => $request->vacation,
                'created_at'            => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Employee info updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }


        // else
        else {

            $employee_img = Employee::find($request->id)->image;
            $deleted_from = public_path('/uploads/employee/' . $employee_img);
            unlink($deleted_from);

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()) . '.' . $extension;
            Image::make($image)->save(public_path('/uploads/employee/' . $file_name));

            Employee::find($request->id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'phone'                 => $request->phone,
                'address'               => $request->address,
                'country'               => $request->country,
                'city'                  => $request->city,
                'salary'                => $request->salary,
                'experience'            => $request->experience,
                'vacation'              => $request->vacation,
                'image'                 => $file_name,
                'created_at'            => Carbon::now(),
            ]);
        }

        $notification = array(
            'message'       => 'Employee info updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function destroy($id)
    {
        Employee::Find($id)->delete();

        $notification = array(
            'message' => 'Employee deleted',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }
}
