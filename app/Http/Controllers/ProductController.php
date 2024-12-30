<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Requests\ProductRequest;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function productList()
    {
        return view('backend.productList');
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'products_'.date('Y-m-d').'.xlsx');
    }
    public function import(Request $request) 
    {
        try{
            Excel::import(new ProductImport, $request->file('file'));
            toastr()->success('Product Imported Succesfully');
            return redirect()->route('backend.product.list');
        }catch(\Exception $ex){
            toastr()->error($ex->getMessage());
            return redirect()->route('backend.product.list');
        }
        
    }
    public function getProductData()
    {
        try
        {
            $data=Product::all();
                return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $editUrl = route('backend.product.edit', $row->id);
                                $deleteUrl = route('backend.product.delete', $row->id);
                                $btn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm mr-2">Edit</a><a href="'.$deleteUrl.'" class="edit btn btn-danger btn-sm mr-2">Delete</a>';
                                    return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function productForm()
    {
        $allBrand = Brand::all();
        $allCategory = Category::with('parent')->get();
        return view('backend.pages.productForm', compact( 'allCategory', 'allBrand'));
    }

    public function productStore(Request $request)
    {
        try
        {
        $fileName = FileUploadService::fileUpload($request->file('productImage'),'product');
        ProductRepository::store($request, $fileName);
        toastr()->success('Product Added Succesfully !!');
        return redirect()->route('backend.product.list');
        }
        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');
        return view('backend.productList', compact('e'));
        }
    }

    public function productEdit($id)
    {
        $prod = Product::find($id);

        return view('backend.pages.productEdit', compact('prod'));
    }

    public function productUpdate(Request $request, $id)

    {

        $validation= Validator::make($request->all(),
 [
            'productName' => 'required | min:2',
            'productPrice' => 'required',
            'productImage' => 'file',
        ]);

        $product = Product::find($id);

        $fileName = $product->image;

        if($request->hasFile('productImage'))
        {
            $file = $request->file('productImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('product', $fileName);
        }

        try
        {
        $product->update([

            'name' => $request->productName,
            // 'category_id' => $request->productCategory,
            // 'brand_id' => $request->productBrand,
            'slug' => str()->slug($request->productName),
            'price' => $request->productPrice,
            'discount' => $request->productDiscount,
            'stock' => $request->productStock,
            'description' => $request->productDescription,
            'image' => $fileName,
            'status' => $request->productStatus,

        ]);

        toastr()->success('Product Updated Succesfully !!');

        return redirect()->route('backend.product.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.product.list');
        }
    }

    public function productDelete($id)
    {
        $deleteProduct = Product::find($id);

        $deleteProduct->delete();

        toastr()->success('Product Removed Succesfully !!');

        return redirect()->back();
    }

}
