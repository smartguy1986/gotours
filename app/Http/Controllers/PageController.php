<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
        $data['company_details'] = DB::table('company_details')->select('*')->get();
        $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id', '=', 'blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();
        return view('layouts.pages.aboutuspage', $data);
    }

    
}
