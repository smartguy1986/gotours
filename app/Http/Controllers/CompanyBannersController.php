<?php

namespace App\Http\Controllers;

use App\Models\CompanyBanners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use DB;

class CompanyBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banners'] = DB::table('company_banners')->select('*')->get();
        return view('layouts.admin.company.banners', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tagline' => 'required',
            'banner_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required'
        ]);
    
        $fileName = time().'.'.$request->banner_image->extension();  
        $request->banner_image->move(public_path('images/banners'), $fileName);

        $save = new CompanyBanners;
        $save->imageURL = $fileName;
        $save->tagline = strtoupper($request->tagline);
        $save->description = $request->description;
        $save->status = 1;
        $save->save();

        Session::flash('success', 'Banner Has been uploaded');
        return redirect('/admin/company/banners');
    }

    public function delete_banners(Request $request, $id, $filename)
    {
        DB::table('company_banners')->where('id', $id)->delete();
        $file_path = public_path().'/images/banners/'.$filename;
        unlink($file_path);
        Session::flash('success', 'Banner Has been deleted');
        return redirect('/admin/company/banners');
    }
}
