<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    function rel_to_supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
