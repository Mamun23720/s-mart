<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function categoryList()
    {
        return view('backend.categoryList');
    }

    public function getCategoryData()
    {
        try
        {
            $data=Category::all();
                return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $editUrl = route('backend.category.edit', $row->id);
                                $deleteUrl = route('backend.category.delete', $row->id);
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
