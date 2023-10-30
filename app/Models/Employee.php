<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_advance()
    {
        return $this->belongsTo(EmployeeAdvanceSalary::class, 'id', 'employee_id');
    }
}
