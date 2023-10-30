<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAdvanceSalary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function rel_to_employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
