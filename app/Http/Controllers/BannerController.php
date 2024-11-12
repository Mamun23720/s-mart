<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use App\Imports\BannerImport;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\returnSelf;

class BannerController extends Controller
{
    public function bannerList()
    {
        return view('backend.bannerList');
    }

    public function getBannerData()
    {
        try
        {
            $data=Banner::all();
                return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $editUrl = route('backend.banner.edit', $row->id);
                                $deleteUrl = route('backend.banner.delete', $row->id);
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

    public function bannerForm()
    {
        return view('backend.pages.bannerForm');
    }

    public function bannerImportExcelForm()
    {
        return view('backend.pages.bannerImportExcelForm');
    }

    public function bannerImportExcelStore(Request $request)
    {
        try
        {
            $allBanner=Banner::all();
            FacadesExcel::import(new BannerImport, $request->file('bannerImport'));
            return view('backend.bannerList', compact('allBanner'));
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function bannerStore(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'bannerName' => 'required',
            'bannerImage' => 'required|file',
            'bannerDescription' => 'required',
        ]);
        if ($validation->fails())
        {
            foreach ($validation->errors()->all() as $errorMessage) {
                toastr()->error($errorMessage);
            }
            return redirect()->route('backend.pages.bannerForm')->withErrors($validation)->withInput();
        }
        $fileName = null;
        if($request->hasFile('bannerImage'))
        {
            $file = $request->file('bannerImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('banner', $fileName);
        }
        try
        {
        Banner::create([
            'image' => $fileName,
            'name' => $request->bannerName,
            'description' => $request->bannerDescription,
            'status' => $request->bannerStatus,
        ]);
        toastr()->success('Banner Added Succesfully !!');
        return redirect()->route('backend.banner.list');
        }
        catch(Throwable $e)
        {
        toastr()->error($e->getMessage());
        return redirect()->route('backend.banner.list');
        }
    }

    public function bannerEdit($id)
    {
        $banner = Banner::find($id);
        return view('backend.pages.bannerEdit', compact('banner'));
    }

    public function bannerUpdate(Request $request, $id)
    {
        // dd($request->all());
        $banner = Banner::find($id);
        $fileName = $banner->image;
        if($request->hasFile('bannerImage'))
        {
            $file = $request->file('bannerImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('banner', $fileName);
        }
        $banner->update([
            'image' => $fileName,
            'name' => $request->bannerName,
            'description' => $request->bannerDescription,
            'status' => $request->bannerStatus,
        ]);
        toastr()->success('Banner Updated Succesfully !!');
        return redirect()->route('backend.banner.list');
    }

    public function bannerDelete($id)
    {
        $deleteBanner = Banner::find($id);
        $deleteBanner->delete();
        toastr()->success('Banner Removed Succesfully !!');
        return redirect()->back();
    }
}
