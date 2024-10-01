<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    
    public function subCategoryList()
    {
        $allSubCategory = SubCategory::all();

        return view('backend.subCategoryList', compact('allSubCategory'));
    }

    
    public function subCategoryForm()
    {

        $allCategory = Category::all();

        return view('backend.pages.subCategoryForm', compact('allCategory'));
    }

    public function subCategoryStore(Request $request)
    {
        // dd($request->all());

        $validation= Validator::make($request->all(),
        [
            'subCategoryName' => 'required | min:2',
            'subCategoryImage' => 'file'
        ]);

        $fileName = null;

        if($request->hasFile('subCategoryImage'))
        {
            $file = $request->file('subCategoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('subCategory', $fileName);
        }

        SubCategory::create([
            'sub_name' => $request->subCategoryName,
            'sub_image' => $fileName,
            'cat_id' => $request->cat_id

        ]);

        toastr()->success('Sub Category Added Succesfully !!');

        return redirect()->route('backend.sub.category.list');

    }

    public function subCategoryEdit($catID)
    {
        $cat = SubCategory::find($catID);

        $allCategory = Category::all();

        return view('backend.pages.subCategoryEdit', compact('cat','allCategory'));
    }

    public function subCategoryUpdate(Request $request, $catID)

    {
        $fileName = null;

        if($request->hasFile('subCategoryImage'))
        {
            $file = $request->file('subCategoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('subCategory', $fileName);
        }

        $category = SubCategory::find($catID);

        $category->update([

            'sub_name' => $request->subCategoryName,
            'cat_id' => $request->cat_id

        ]);

        toastr()->success('Sub Category Updated Succesfully !!');

        return redirect()->route('backend.sub.category.list');
    }

    public function subCategoryDelete($catID)
    {
        $deleteSubCategory = SubCategory::find($catID);
        
        $deleteSubCategory->delete();

        toastr()->success('Sub Category Removed Succesfully !!');

        return redirect()->back();
    }

}


