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

    public function categoryStore(Request $request)
    {
        $validation= Validator::make($request->all(),
        [
            'categoryName' => 'required | min:2',
            'categoryImage' => 'required | file'
        ]);

        $fileName = null;

        if($request->hasFile('categoryImage'))
        {
            $file = $request->file('categoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('category', $fileName);
        }

        Category::create([
            'name' => $request->categoryName,
            'image' => $fileName
        ]);

        toastr()->success('Category Added Succesfully!');

        return redirect()->route('backend.category.list');

    }

    public function deleteCategory($catID)
    {
        $deleteCategory = Category::find($catID);
        
        $deleteCategory->delete();

        toastr()->success('Category Removed Succesfully !');

        return redirect()->back();
    }

    

}
