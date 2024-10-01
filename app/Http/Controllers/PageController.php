<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    
    public function pageList()
    {
        $allPage = Page::all();

        return view('backend.pageList', compact('allPage'));
    }

    
    public function pageForm()
    {
        return view('backend.pages.pageForm');
    }

    public function pageStore(Request $request)
    {
        // dd($request->all());

        $validation= Validator::make($request->all(),
        [
            'pagePosition' => 'required',
            'pageName' => 'required',
            'pageTitle' => 'required',
            'pageDescription' => 'required',
            'pageImage' => 'file',
        ]);

        $fileName = null;

        if($request->hasFile('pageImage'))
        {
            $file = $request->file('pageImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('page', $fileName);
        }

        Page::create([
            'page_position' => $request->pagePosition,
            'page_name' => $request->pageName,
            'page_title' => $request->pageTitle,
            'page_description' => $request->pageDescription,
            'page_image' => $fileName,
        ]);

        toastr()->success('Page Added Succesfully !!');

        return redirect()->route('backend.page.list');

    }

    public function pageEdit($pageID)
    {
        $page = Page::find($pageID);

        return view('backend.pages.pageEdit', compact('page'));
    }

    public function pageUpdate(Request $request, $pageID)

    {
        $category = Page::find($pageID);
        
        $fileName = $category->page_image;

        if($request->hasFile('pageImage'))
        {
            $file = $request->file('pageImage');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('page', $fileName);
        }

        $category->update([

            'page_position' => $request->pagePosition,
            'page_name' => $request->pageName,
            'page_title' => $request->pageTitle,
            'page_description' => $request->pageDescription,
            'page_image' => $fileName,

        ]);

        toastr()->success('Page Updated Succesfully !!');

        return redirect()->route('backend.page.list');
    }

    public function pageDelete($pageID)
    {
        $deleteSubCategory = Page::find($pageID);
        
        $deleteSubCategory->delete();

        toastr()->success('Page Removed Succesfully !!');

        return redirect()->back();
    }
}
