<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public static function store($request, $fileName)
    {
        Product::create([
            'name' => $request->productName,
            'category_id' => $request->productCategory,
            'brand_id' => $request->productBrand,
            'slug' => str()->slug($request->productName),
            'price' => $request->productPrice,
            'discount' => $request->productDiscount,
            'stock' => $request->productStock,
            'description' => $request->productDescription,
            'image' => $fileName,
            'status' => $request->productStatus,
        ]);
    }
}