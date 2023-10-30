<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function index()
    {

        try {
            $attendances = Attendence::select('date')->groupBy('date')->orderBy('date', 'DESC')->get();

            return view('backend.attendence.index', [
                'attendances'      => $attendances,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create()
    {
        try {
            $employees = Employee::all();

            return view('backend.attendence.create', [
                'employees'     => $employees,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Request $request)
    {


        try {
            $employeeCount = count($request->employee_id);


            if (Attendence::where('date', $request->date)->exists()) {

                $notification = array(
                    'message'       => 'Already Exists',
                    'alert-type'    => 'warning',
                );

                return back()->with($notification);
            } else {
                for ($i = 0; $i < $employeeCount; $i++) {
                    $status = 'status' . $i;

                    Attendence::create([
                        'employee_id'          => $request->employee_id[$i],
                        'date'                 => $request->date,
                        'status'               => $request->$status,
                        'created_at'           => Carbon::now(),
                    ]);
                }

                $notification = array(
                    'message'       => 'Attendance Created Successfully',
                    'alert-type'    => 'success',
                );

                return back()->with($notification);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function edit($date)
    {
        try {
            $attendences = Attendence::where('date', $date)->get();

            return view('backend.attendence.edit', [
                'attendences' => $attendences,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function update(Request $request)
    {
        try {

            $employee_count = count($request->employee_id);

            for ($i = 0; $i < $employee_count; $i++) {
                $status = 'status' . $i;


                Attendence::find($request->attendence_id[$i])->update([
                    'employee_id'          => $request->employee_id[$i],
                    'date'                 => $request->date,
                    'status'               => $request->$status,
                    'created_at'           => Carbon::now(),
                ]);
            }

            $notification = array(
                'message'       => 'Attendence Updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function view($date)
    {
        try {
            $attendences = Attendence::where('date', $date)->get();

            return view('backend.attendence.view', [
                'attendences' => $attendences,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
