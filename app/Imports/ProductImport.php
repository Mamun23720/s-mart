<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id'=>$row['id'],
            'name'=>$row['name'],
            'price'=>$row['price'],
        ]);
    }
    public function rules() : array{
        return [
            'id'=>'required',
            'name'=>'required',
            'price'=>'required',
        ];        
    }
}
