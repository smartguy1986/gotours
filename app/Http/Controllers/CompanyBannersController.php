<?php

namespace App\Http\Controllers;

use App\Models\CompanyBanners;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    
        if ($validatedData->fails()) {
            return redirect('company.banners')->with('error', 'Image type is not supported or the size is greater than 2MB');
        }

        $name = $request->file('banner_image')->getClientOriginalName();
        $path = $request->file('banner_image')->store('public/images/banners');

        // $imageName = time().'.'.$request->banner_image->extension();
        // $request->banner_image->move(public_path('public/images/banners'), $imageName);

        $save = new company_banners;
        $save->imageURL = $path.'/'.$name;
        $save->tagline = $request->tagline;
        $save->description = $request->description;
        $save->status = 1;
        $save->save();
    
        return redirect('company.banners')->with('success', 'Banner Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyBanners  $companyBanners
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyBanners $companyBanners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyBanners  $companyBanners
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyBanners $companyBanners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyBanners  $companyBanners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyBanners $companyBanners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyBanners  $companyBanners
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyBanners $companyBanners)
    {
        //
    }
}