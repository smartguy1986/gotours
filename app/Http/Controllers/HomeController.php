<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\BlogController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(CompanyController $companyController, DestinationsController $destinationsController, PackagesController $packagesController, BlogController $blogController)
    {
        $data['company_banners'] = DB::connection('mysql')->table('company_banners')->select('*')->where('status', '1')->orderBy('id', 'DESC')->get();
        $data['company_details'] = $companyController->commonComponent();
        $data['destinations'] = $destinationsController->alldestinationlist('0','2','1');
        $data['destinations2'] =  $destinationsController->alldestinationlist('2','2','1');        
        $data['packages'] = $packagesController->last3package();
        $data['packagesoffers'] = $packagesController->last3packageoffers();
        $data['blogs'] = $blogController->last3blogs();
        $data['categories'] = $packagesController->packagecat();

        return view('home')->with($data);
    }

    public function userHome()
    {
        return view('layouts.user.userhome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminHome()
    {
        return view('layouts.admin.adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function managerHome()
    {
        return view('layouts.manager.managerHome');
    }
}
