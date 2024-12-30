<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Repositories\ProductRepository;


class ProductController extends Controller
{
    public function getProduct()
    {
        $product= Product::all();
        return $this->responseSuccess($product,'All Products are here');
    }

    public function getProductCollection()
    {
        $product= Product::all();
        return $this->responseSuccess(ProductResource::collection($product), 'All product collections are here');
    }

    public function getProductSingle($id)
    {
        $product= Product::find($id);
        return $this->responseSuccess(ProductResource::make($product), 'Single product is here');
    }

    public function createProduct(Request $request)
    {
        $fileName = null;
        
        if($request->hasFile('productImage'))
        {
            $file = $request->file('productImage');

            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('/product', $fileName);
        }
    
       $product =  Product::create([
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
        return $this->responseSuccess($product, 'New Product added');
    }
}
