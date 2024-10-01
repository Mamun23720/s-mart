<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class WebsiteController extends Controller
{
    
    public function websiteList()
    {
        $allWebsite = Website::all();

        return view('backend.websiteList', compact('allWebsite'));
    }

    public function websiteForm()
    {
        $allWebsite = Website::all();

        return view('backend.pages.websiteForm', compact('allWebsite'));
    }

    public function websiteStore(Request $request)
    {

        // dd($request->all());

        $validation= Validator::make($request->all(),
 [
            // 'websiteName' => 'required | min:2',
            // 'websiteMobile' => 'required | min:2',
            // 'websiteHelpline' => 'required',
            // 'websiteEmail' => 'required',
            // 'websiteAddress' => 'required',
            // 'websiteFacbook' => 'required',
            // 'websiteTwitter' => 'required',
            // 'websiteInstagram' => 'required',
            // 'websiteLinkedin' => 'required',
            // 'websiteYoutube' => 'required',
            // 'websiteLogo' => 'file',
        ]);

        $fileName = null;

        if($request->hasFile('websiteLogo'))
        {
            $file = $request->file('websiteLogo');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('logo', $fileName);
        }

        try
        {
        Website::create([
            'name' => $request->websiteName,
            'mobile' => $request->websiteMobile,
            'helpline' => $request->websiteHelpline,
            'email' => $request->websiteEmail,
            'address' => $request->websiteAddress,
            'facebook' => $request->websiteFacbook,
            'twitter' => $request->websiteTwitter,
            'instagram' => $request->websiteInstagram,
            'linkedin' => $request->websiteLinkedin,
            'youtube' => $request->websiteYoutube,
            'logo' => $fileName,
        ]);

        toastr()->success('Website Information Added Succesfully !!');

        return redirect()->route('backend.website.list');
        }

        catch(Throwable $e)
        {
        toastr()->error('Something Went Wrong');

        return redirect()->route('backend.website.list');
        }

    }

    public function websiteEdit($id)
    {
        $website = Website::find($id);

        return view('backend.pages.websiteEdit', compact('website'));
    }
    public function websiteUpdate(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            // 'websiteName' => 'required|min:2',
            // 'websiteMobile' => 'required|min:2',
            // 'websiteHelpline' => 'required',
            // 'websiteEmail' => 'required',
            // 'websiteAddress' => 'required',
            // 'websiteFacbook' => 'required',
            // 'websiteTwitter' => 'required',
            // 'websiteInstagram' => 'required',
            // 'websiteLinkedin' => 'required',
            // 'websiteYoutube' => 'required',
            // 'websiteLogo' => 'file',
        ]);
    
        $website = Website::find($id);
    
        $fileName = $website->logo;
    
        if ($request->hasFile('websiteLogo')) {
            $file = $request->file('websiteLogo');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('logo', $fileName);
        }
    
        try {
            
            $website->update([
                'name' => $request->websiteName,
                'mobile' => $request->websiteMobile,
                'helpline' => $request->websiteHelpline,
                'email' => $request->websiteEmail,
                'address' => $request->websiteAddress,
                'facebook' => $request->websiteFacbook,
                'twitter' => $request->websiteTwitter,
                'instagram' => $request->websiteInstagram,
                'linkedin' => $request->websiteLinkedin,
                'youtube' => $request->websiteYoutube,
                'logo' => $fileName,
            ]);
    
            toastr()->success('Website Information Updated Successfully !!');

            return redirect()->route('backend.website.list');

        } catch (Throwable $e) 
        {
            toastr()->error('Something Went Wrong');

            return redirect()->route('backend.website.list');

        }
    }
    
    public function websiteDelete($id)
    {
        $deleteWebsite = Website::find($id);

        $deleteWebsite->delete();

        toastr()->success('Website Information Removed Succesfully !!');

        return redirect()->back();
    }

}
