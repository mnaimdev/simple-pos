<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalCustomer = count(Customer::all());
        $totalSupplier = count(Supplier::all());
        $totalEmployee = count(Employee::all());

        // monthly expense
        $currentMonth = now()->startOfMonth();
        $currentYear = now()->startOfYear();
        $endYear = now()->endOfYear();

        $monthlyExpense = Expense::where('date', '>=', $currentMonth)->where('date', '<=', now())->sum('amount');

        $yearlyExpense = Expense::where('date', '>=', $currentYear)->where('date', '<=', $endYear)->sum('amount');


        return view('dashboard', [
            'totalCustomer'         => $totalCustomer,
            'totalSupplier'         => $totalSupplier,
            'totalEmployee'         => $totalEmployee,
            'monthlyExpense'        => $monthlyExpense,
            'yearlyExpense'         => $yearlyExpense,
        ]);
    }
}
