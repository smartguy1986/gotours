<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\BlogController;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['destinations'] = $destinationsController->index();
        return view('layouts.pages.careerpage', $data);
    }

    public function joblist()
    {
        $data['careers'] = Careers::select('*')->orderBy('created_at', 'DESC')->get();
        return view('layouts.admin.career.jobslist', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.career.addjobs');
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
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function show(Careers $careers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function edit(Careers $careers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Careers $careers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Careers $careers)
    {
        //
    }
}