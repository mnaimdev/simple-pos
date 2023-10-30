<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $todays = Expense::where('date', $date)->get();

        return view('backend.expense.index', [
            'todays'        => $todays,
        ]);
    }

    public function create()
    {
        return view('backend.expense.create');
    }

    public function store(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'amount'    => 'required',
            'date'      => 'required',
            'details'   => 'required',
            'month'     => 'required',
            'year'      => 'required',
        ]);

        $expense->create($validated);

        $notification = array(
            'message'       => 'Expense Added',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function edit($id)
    {
        $expense = Expense::find($id);

        return view('backend.expense.edit', [
            'expense' => $expense,
        ]);
    }


    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'amount'    => 'required',
            'date'      => 'required',
            'details'   => 'required',
            'month'     => 'required',
            'year'      => 'required',
        ]);

        $expense->find($request->id)->update($validated);

        $notification = array(
            'message'       => 'Expense updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function month()
    {
        $date = date('F');
        $months = Expense::where('month', $date)->get();

        return view('backend.expense.month', [
            'months' => $months,
        ]);
    }

    public function year()
    {
        $date = date('Y');
        $years = Expense::where('year', $date)->get();

        return view('backend.expense.year', [
            'years'     => $years,
        ]);
    }
}
