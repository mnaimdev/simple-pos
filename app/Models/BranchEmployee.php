<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchEmployee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
