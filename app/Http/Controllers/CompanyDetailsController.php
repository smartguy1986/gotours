<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetails;
use Illuminate\Http\Request;
use DB;

class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['company'] = DB::table('company_details')->select('*')->get();
        return view('layouts.admin.company.basicinfo', $data);
    }

    // public function banners()
    // {
    //     $data['banners'] = DB::table('company_banners')->select('*')->get();
    //     return view('layouts.admin.company.banners', $data);
    // }

    // public function banners_store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //     ]);
    
    //     // if ($validator->fails()) {
    //     //     return redirect('company.banners')->with('error', 'Image type is not supported or the size is greater than 2MB');
    //     // }

    //     // $name = $request->file('banner_image')->getClientOriginalName();
    //     // $path = $request->file('banner_image')->store('public/images/banners');

    //     $imageName = time().'.'.$request->banner_image->extension();
    //     $request->banner_image->move(public_path('public/images/banners'), $imageName);

    //     $save = new company_banners;
    //     $save->imageURL = $imageName;
    //     $save->tagline = $request->tagline;
    //     $save->description = $request->description;
    //     $save->status = 1;
    //     $save->save();
    
    //     //return redirect('image-upload')->with('status', 'Banner Has been uploaded');
    // }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDetails $companyDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDetails $companyDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_address' => 'required',
            'company_bio' => 'required',
        ]);
        
        $company = CompanyDetails::find($id);
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->company_address = $request->company_address;
        $company->company_phone = $request->company_phone;
        $company->company_bio = $request->company_bio;
        $company->save();

        return redirect()->route('company.basic')
        ->with('success','Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDetails $companyDetails)
    {
        //
    }
}
