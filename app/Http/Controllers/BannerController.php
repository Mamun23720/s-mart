<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

use function PHPUnit\Framework\returnSelf;

class BannerController extends Controller
{
    public function bannerList()
    {
        $allBanner = Banner::all();

        return view('backend.bannerList', compact('allBanner'));
    }

    public function bannerForm()
    {
        return view('backend.pages.bannerForm');
    }

    public function bannerStore(Request $request)
    {

        // dd($request->all());..

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
        toastr()->error('Something Went Wrong');

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
