<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    public static function store($request, $fileName)
    {

        Banner::create([

            'image' => $fileName,
            'name' => $request->bannerName,
            'description' => $request->bannerDescription,
            'status' => $request->bannerStatus,
            
        ]);
        
        toastr()->success('Banner Added !!');

    }
}