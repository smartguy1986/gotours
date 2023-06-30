<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(Request $request, CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['destinations'] = $destinationsController->index();
        return view('layouts.manager.managerHome')->with($data);
    }
}