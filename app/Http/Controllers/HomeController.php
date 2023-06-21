<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function index()
    {
        $data['company_banners'] = DB::table('company_banners')->select('*')->where('status', '1')->orderBy('id', 'DESC')->get();
        $data['company_details'] = DB::table('company_details')->select('*')->get();
        $data['destinations'] = DB::table('destinations')->select('*')->where([['status', '=', '1'], ['featured', '=', '1']])->orderBy('created_at', 'desc')->skip(0)->take(2)->get();
        $data['destinations2'] = DB::table('destinations')->select('*')->where([['status', '=', '1'], ['featured', '=', '1']])->orderBy('created_at', 'desc')->skip(2)->take(2)->get();
        $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where('packages.status', '=', '1')->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
        $data['packagesoffers'] = DB::table('packages')->select('packages.*', 'destinations.name', 'destinations.slug as dname')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'], ['is_sale', '=', '1']])->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
        $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id', '=', 'blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();
        $data['categories'] = DB::table('package_category')->selectRaw("package_category.*, COUNT('packages.id') AS dest")->join('packages', 'package_category.id', '=', 'packages.category')->where('package_category.status', '=', '1')->groupBy('package_category.id')->skip(0)->take(6)->get();

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
