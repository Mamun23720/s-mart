<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{

    public function brandList()
    {

        return view('backend.brandList');
    }

    public function getBrandData()
    {
        try
        {
            $data=Brand::all();
                return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $editUrl = route('backend.brand.edit', $row->id);
                                $deleteUrl = route('backend.brand.delete', $row->id);
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

   

    public function brandForm()
    {
        $allBrand = Brand::all();

        return view('backend.pages.brandForm', compact('allBrand'));
    }

    public function brandStore(Request $request)
    {

        dd($request->all());

        $validation= Validator::make($request->all(),
 [
            'brandName' => 'required | min:2',
            'brandImage' => 'file',
        ]);

        $fileName = null;

        if($request->hasFile('brandImage'))
        {
            $file = $request->file('brandImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('brand', $fileName);
        }

        try
        {
        Brand::create([
            'name' => $request->brandName,
            'description' => $request->brandDescription,
            'logo' => $fileName,
            'status' => $request->brandStatus,
        ]);

        toastr()->success('Brand Added Succesfully !!');

        return redirect()->route('backend.brand.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.brand.list');
        }

    }

    public function brandEdit($id)
    {
        $brand = Brand::find($id);

        return view('backend.pages.brandEdit', compact('brand'));
    }

    public function brandUpdate(Request $request, $id)

    {

        $validation= Validator::make($request->all(),
        [
            'brandName' => 'required | min:2',
            'brandImage' => 'file',
        ]);

        $brand = Brand::find($id);

        $fileName = $brand->logo;

        if($request->hasFile('brandImage'))
        {
            $file = $request->file('brandImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('brand', $fileName);
        }

        try
        {
        $brand->update([

            'name' => $request->brandName,
            'description' => $request->brandDescription,
            'logo' => $fileName,
            'status' => $request->brandStatus,

        ]);

        toastr()->success('Brand Updated Succesfully !!');

        return redirect()->route('backend.brand.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.brand.list');
        }
    }

    public function brandDelete($id)
    {
        $brandDelete = Brand::find($id);

        $brandDelete->delete();

        toastr()->success('Brand Removed Succesfully !!');

        return redirect()->back();
    }

}
