<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use DB;
use File;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['packages'] = DB::table('packages')->select('*')->get();
        return view('layouts.admin.packages.lists', $data);
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
    public function category()
    {
        $data['categories'] = DB::table('package_category')->select('*')->get();
        return view('layouts.admin.packages.addcat', $data);
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

    public function add(Request $request)
    {
        $data['categories'] = DB::table('package_category')->select('*')->get();
        return view('layouts.admin.packages.addpackage', $data);
    }

    public function save_category(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required',
            'cat_tagline' => 'required',
            'cat_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'cat_description' => 'required',
            'status' => 'required',
        ]);
    
        $fileName = time().'.'.$request->cat_image->extension();  
        $request->cat_image->move(public_path('images/categories'), $fileName);

        // $save = new Packages;
        // $save->cat_name = strtoupper($request->cat_name);
        // $save->cat_image = $fileName;
        // $save->cat_tagline = $request->cat_tagline;
        // $save->cat_description = $request->cat_description;
        // $save->status = 1;
        // $save->save();
  
        $check = DB::table('package_category')->insertGetId(array(
                    'cat_name'      => $request->cat_name,
                    'cat_tagline'     => $request->cat_tagline,
                    'cat_image'      => $fileName,
                    'cat_description'   => $request->cat_description,
                    'status'    => $request->status,
                    'created_at' => date("Y-m-d")
                ));
    
        return redirect('/admin/packages/add/category')->with('success', 'Destination Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packages $packages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $packages)
    {
        //
    }
}
