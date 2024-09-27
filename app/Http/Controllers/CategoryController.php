<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $allCategory = Category::all();

        return view('backend.categoryList', compact('allCategory'));
    }

    public function categoryForm()
    {
        return view('backend.pages.categoryForm');
    }

    public function categoryStore(Request $request)
    {
        $validation= Validator::make($request->all(),
        [
            'categoryName' => 'required | min:2',
            'categoryImage' => 'file'
        ]);

        $fileName = null;

        if($request->hasFile('categoryImage'))
        {
            $file = $request->file('categoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('category', $fileName);
        }

        Category::create([
            'cat_name' => $request->categoryName,
            'cat_image' => $fileName
        ]);

        toastr()->success('Category Added Succesfully !!');

        return redirect()->route('backend.category.list');

    }

    public function categoryEdit($catID)
    {
        $cat = Category::find($catID);

        return view('backend.pages.categoryEdit', compact('cat'));
    }

    public function categoryUpdate(Request $request, $catID)

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

    public function categoryDelete($catID)
    {
        $deleteCategory = Category::find($catID);
        
        $deleteCategory->delete();

        toastr()->success('Category Removed Succesfully !!');

        return redirect()->back();
    }

}
