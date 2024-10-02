<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $allCategory = Category::with('parent')->get();

        return view('backend.categoryList', compact('allCategory'));
    }

    public function categoryForm()
    {
        $allCategory = Category::all();

        return view('backend.pages.categoryForm', compact('allCategory'));
    }

    public function categoryStore(Request $request)
    {

        // dd($request->all());
        $validation= Validator::make($request->all(),
        [
            'categoryName' => 'required | min:2',
            'categoryImage' => 'file',
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
            'name' => $request->categoryName,
            'image' => $fileName,
            'parent_id' => $request->parentName,
            // 'slug' => str()->slug($request->categoryName),
            'status' => $request->categoryStatus,
        ]);

        toastr()->success('Category Added Succesfully !!');

        return redirect()->route('backend.category.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.category.list');
        }


    }

    public function categoryEdit($id)
    {
        $cat = Category::find($id);

        return view('backend.pages.categoryEdit', compact('cat'));
    }

    public function categoryUpdate(Request $request, $id)

    {

        $category = Category::find($id);


        $fileName = $category->image;

        if($request->hasFile('categoryImage'))
        {
            $file = $request->file('categoryImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('category', $fileName);
        }

        $category->update([

            'name' => $request->categoryName,
            'image' => $fileName,
            'parent_id' => $request->parentName,
            // 'cat_slug' => str()->slug($request->categoryName),
            'status' => $request->categoryStatus,

        ]);

        toastr()->success('Category Updated Succesfully !!');

        return redirect()->route('backend.category.list');
    }

    public function categoryDelete($id)
    {
        $deleteCategory = Category::find($id);

        $deleteCategory->delete();

        toastr()->success('Category Removed Succesfully !!');

        return redirect()->back();
    }

}
