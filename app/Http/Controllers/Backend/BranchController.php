<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BranchEmployee;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get();

        return view('backend.branch.index', [
            'branches' => $branches,
        ]);
    }

    public function create()
    {
        return view('backend.branch.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required',
            'location'  => 'required',
        ]);

        Branch::create($validate);


        $notification = array(
            'message'       => 'Branch Created',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function view($id)
    {
        $branch = Branch::find($id);


        return view('backend.branch.branch_one', [
            'branch'        => $branch,
        ]);
    }

    public function one()
    {
        $branch = Branch::where('name', 'Branch One')->first();

        $employees = BranchEmployee::where('branch_id', $branch->id)->get();

        return view('backend.branch.branch_one', [
            'branch'        => $branch,
            'employees'     => $employees,
        ]);
    }

    public function two()
    {
        $branch = Branch::where('name', 'Branch Three')->first();
        $employees = BranchEmployee::where('branch_id', $branch->id)->get();


        return view('backend.branch.branch_three', [
            'branch'        => $branch,
            'employees'     => $employees,
        ]);
    }


    public function three()
    {
        $branch = Branch::where('name', 'Branch Three')->first();
        $employees = BranchEmployee::where('branch_id', $branch->id)->get();


        return view('backend.branch.branch_three', [
            'branch'        => $branch,
            'employees'     => $employees,
        ]);
    }


    public function branch_employee_store(Request $request)
    {
        BranchEmployee::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'branch_id'     => $request->branch_id,
        ]);

        $notification = array(
            'message'       => 'Employee Added to This Branch',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }
}
