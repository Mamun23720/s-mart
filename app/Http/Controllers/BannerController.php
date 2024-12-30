<?php

namespace App\Http\Controllers;

use App\Events\BannerEvent;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\returnSelf;

class BannerController extends Controller
{
    public function bannerList()
    {
        try {
            if (Cache::get('banner')) {
                $title = "Data coming from Cache";
                $data = Banner::all();
            } else {
                $title = "Data coming from Database";
                $data = Banner::all();
                Cache::put("banner", $data);
            }
            return view('backend.bannerList', compact('title', 'data'));
        } catch (\Throwable $e) {
            // toastr()->error($e->getMessage());
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function getBannerData()
    {
        try {
            $data = Banner::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('backend.banner.edit', $row->id);
                    $deleteUrl = route('backend.banner.delete', $row->id);
                    $btn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm mr-2">Edit</a> <a href="' . $deleteUrl . '" class="edit btn btn-danger btn-sm mr-2">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Throwable $e) {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function bannerStore(BannerRequest $request)
    {
        try {
            $fileName = FileUploadService::fileUpload($request->file('bannerImage'), 'banner');
            BannerRepository::store($request, $fileName);
            BannerEvent::dispatch();
            return redirect()->route('backend.banner.list');
        } catch (\Throwable $e) {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
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

        if ($request->hasFile('bannerImage')) {
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

        toastr()->success('Banner Updated !!');

        return redirect()->route('backend.banner.list');
    }

    public function bannerDelete($id)
    {
        try {
            $deleteBanner = Banner::find($id);
            $deleteBanner->delete();
            toastr()->success('Banner Removed !!');
            return redirect()->back();
        } catch (\Throwable $e) {
            toastr()->error('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }
}
