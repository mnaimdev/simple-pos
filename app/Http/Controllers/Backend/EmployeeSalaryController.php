<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeAdvanceSalary;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function salary()
    {
        $advance_salaries = EmployeeAdvanceSalary::latest()->get();

        return view('backend.employee.salary.index', [
            'advance_salaries' => $advance_salaries,
        ]);
    }

    public function create()
    {
        $employees = Employee::latest()->get();

        return view('backend.employee.salary.create', [
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {


        $request->validate([
            'employee_id'       => 'required',
            'month'             => 'required',
            'year'              => 'required',
            'amount'            => 'required'
        ]);

        $employee_salary = Employee::find($request->employee_id)->salary;

        if (EmployeeAdvanceSalary::where('employee_id', $request->employee_id)->where('year', $request->year)->exists()) {
            $notification = array(
                'message'           => 'Already Paid Advance Salary',
                'alert-type'        => 'warning',
            );

            return back()->with($notification);
        }

        // else
        else {


            if ($request->amount <= $employee_salary) {
                EmployeeAdvanceSalary::create([
                    'employee_id'       => $request->employee_id,
                    'month'             => $request->month,
                    'year'              => $request->year,
                    'amount'            => $request->amount,
                ]);

                $notification = array(
                    'message'           => 'Advance Salary Paid',
                    'alert-type'        => 'success',
                );

                return back()->with($notification);
            }

            // else
            else {
                $notification = array(
                    'message'       => 'Advance Salary Can not be greater than salary',
                    'alert-type'    => 'warning',
                );

                return back()->with($notification);
            }
        }
    }

    public function edit($id)
    {
        $advance_salaries = EmployeeAdvanceSalary::find($id);
        $employees = Employee::latest()->get();

        return view('backend.employee.salary.edit', [
            'employees'         => $employees,
            'advance_salaries'  => $advance_salaries,
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required',
            'month'             => 'required',
            'year'              => 'required',
            'amount'            => 'required'
        ]);

        $employee_salary = Employee::find($request->employee_id)->salary;

        if (EmployeeAdvanceSalary::where('employee_id', $request->employee_id)->where('year', $request->year)->exists()) {
            $notification = array(
                'message'           => 'Already Exists',
                'alert-type'        => 'warning',
            );

            return back()->with($notification);
        }

        // else
        else {

            if ($request->amount <= $employee_salary) {

                EmployeeAdvanceSalary::find($request->id)->update([
                    'employee_id'       => $request->employee_id,
                    'month'             => $request->month,
                    'year'              => $request->year,
                    'amount'            => $request->amount,
                ]);

                $notification = array(
                    'message'           => 'Advance Salary Updated',
                    'alert-type'        => 'success',
                );

                return back()->with($notification);
            }

            // else
            else {
                $notification = array(
                    'message'       => 'Advance Salary Can not be greater than salary',
                    'alert-type'    => 'warning',
                );

                return back()->with($notification);
            }
        }
    }

    public function destroy($id)
    {
        EmployeeAdvanceSalary::find($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfullly',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }
}
