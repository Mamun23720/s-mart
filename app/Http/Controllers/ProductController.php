<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productList()
    {
        $allCategory = Product::with('parent')->get();

        return view('backend.categoryList', compact('allCategory'));
    }

    public function productForm()
    {
        $allCategory = Category::all();

        return view('backend.pages.categoryForm', compact('allCategory'));
    }

    public function productStore(Request $request)
    {

        // dd($request->all());
        $validation= Validator::make($request->all(),
        [
            'categoryName' => 'required | min:2',
            'categoryImage' => 'file',
            'categorySlug' => 'required'
        ]);

        $fileName = null;

        if($request->hasFile('categoryImage'))
        {
            $file = $request->file('categoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('category', $fileName);
        }

        try
        {
        Category::create([
            'cat_name' => $request->categoryName,
            'cat_image' => $fileName,
            'parent_id' => $request->parentName,
            'cat_slug' => str()->slug($request->categoryName),
        ]);

        toastr()->success('Category Added Succesfully !!');

        return redirect()->route('backend.category.list');
        }

        catch(Throwable $e)
        {
        toastr()->success('Something Went Wrong');

        return redirect()->route('backend.category.list');
        }


    }

    public function productEdit($catID)
    {
        $cat = Category::find($catID);

        return view('backend.pages.categoryEdit', compact('cat'));
    }

    public function productUpdate(Request $request, $catID)

    {
        $fileName = null;

        if($request->hasFile('categoryImage'))
        {
            $file = $request->file('categoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('category', $fileName);
        }

        $category = Category::find($catID);

        $category->update([

            'cat_name' => $request->categoryName,

        ]);

        toastr()->success('Category Updated Succesfully !!');

        return redirect()->route('backend.category.list');
    }

    public function productDelete($catID)
    {
        $deleteCategory = Category::find($catID);

        $deleteCategory->delete();

        toastr()->success('Category Removed Succesfully !!');

        return redirect()->back();
    }
}
