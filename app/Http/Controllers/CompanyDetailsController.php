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

    public function banners()
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
