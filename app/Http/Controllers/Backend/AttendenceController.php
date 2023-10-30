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
        $attendences = Attendence::select('date')->groupBy('date')->orderBy('date', 'DESC')->get();

        return view('backend.attendence.index', [
            'attendences'      => $attendences,
        ]);
    }

    public function create()
    {
        $employees = Employee::all();

        return view('backend.attendence.create', [
            'employees'     => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $employee_count = count($request->employee_id);


        if (Attendence::where('date', $request->date)->exists()) {

            $notification = array(
                'message'       => 'Already submitted',
                'alert-type'    => 'warning',
            );

            return back()->with($notification);
        }

        // else
        else {
            for ($i = 0; $i < $employee_count; $i++) {
                $status = 'status' . $i;

                Attendence::create([
                    'employee_id'          => $request->employee_id[$i],
                    'date'                 => $request->date,
                    'status'               => $request->$status,
                    'created_at'           => Carbon::now(),
                ]);
            }

            $notification = array(
                'message'       => 'Attendence Submitted',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }
    }


    public function edit($date)
    {
        $attendences = Attendence::where('date', $date)->get();

        return view('backend.attendence.edit', [
            'attendences' => $attendences,
        ]);
    }


    public function update(Request $request)
    {
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
    }


    public function view($date)
    {
        $attendences = Attendence::where('date', $date)->get();

        return view('backend.attendence.view', [
            'attendences' => $attendences,
        ]);
    }
}
