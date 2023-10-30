<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\EmployeePaySalary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaySalaryController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        return view('backend.employee.pay.index', [
            'employees'     => $employees,
        ]);
    }

    public function create($id)
    {
        $employees = Employee::find($id);

        return view('backend.employee.pay.create', [
            'employees'     => $employees,
        ]);
    }

    public function store(Request $request)
    {

        $employee_id = $request->employee_id;

        if (EmployeePaySalary::where('employee_id', $employee_id)->where('month', $request->month)->exists()) {
            $notification = array(
                'message'           => 'Salary Paid Already!',
                'alert-type'        => 'warning',
            );

            return back()->with($notification);
        }

        // else
        else {
            EmployeePaySalary::insert([
                'employee_id'       => $request->employee_id,
                'month'             => $request->month,
                'paid_amount'       => $request->paid_amount,
                'advance_amount'    => $request->advance_amount,
                'due_amount'        => $request->due_amount,
                'created_at'        => Carbon::now(),
            ]);

            $notification = array(
                'message'           => 'Salary Paid Successfully!',
                'alert-type'        => 'success',
            );

            return back()->with($notification);
        }
    }


    function last_month_salary()
    {
        $month_salaries = EmployeePaySalary::latest()->get();

        return view('backend.employee.pay.month_salary', [
            'month_salaries' => $month_salaries,
        ]);
    }
}
