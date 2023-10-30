<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'product_name'      => $row[0],
            'product_code'      => $row[1],
            'product_garage'    => $row[2],
            'product_store'     => $row[3],
            'buying_price'      => $row[4],
            'selling_price'     => $row[5],
            'buying_date'       => $row[6],
            'expire_date'       => $row[7],
            'product_image'     => $row[8],
            'category_id'       => $row[9],
            'supplier_id'       => $row[10],
        ]);
    }
}
