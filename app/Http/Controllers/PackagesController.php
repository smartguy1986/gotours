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
        $data['destinations'] = DB::table('destinations')->select('*')->get();
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

    public function save_package(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'imageURL' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'days' => 'required',
            'nights' => 'required',
            'mingroup' => 'required',
            'destinations' => 'required',
            'descriptions' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
            'is_sale' => 'required',
            'status' => 'required',
            'category' => 'required'
        ]);
    
        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName1 = time().$pass.'.'.$request->banner->extension();  
        $request->banner->move(public_path('images/packages'), $fileName1);

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName2 = time().$pass.'.'.$request->imageURL->extension();  
        $request->imageURL->move(public_path('images/packages'), $fileName2);

        // echo "<br>".$request->title;
        // echo "<br>".$request->tagline;
        // echo "<br>".$fileName1;
        // echo "<br>".$fileName2;
        // echo "<br>".$request->days." Days / ".$request->nights." Nights";
        // echo "<br>".$request->mingroup;
        // echo "<br>".$request->destinations;
        // echo "<br>".$request->contact_person;
        // echo "<br>".$request->phone;
        // echo "<br>".$request->address;
        // echo "<br>".$request->price;
        // echo "<br>".$request->is_sale;
        // echo "<br>".$request->sale_price;
        // echo "<br>".$request->status;

        $save = new Packages;
        $save->title = strtoupper($request->title);
        $save->tagline = $request->tagline;
        $save->banner = $fileName1;
        $save->imageURL = $fileName2;
        $save->days = $request->days;
        $save->nights = $request->nights;
        $save->mingroup = $request->mingroup;
        $save->destination = $request->destinations;
        $save->descriptions = $request->descriptions;
        $save->contact_person = $request->contact_person;
        $save->phone = $request->phone;
        $save->address = $request->address;
        $save->price = $request->price;
        $save->is_sale = $request->is_sale;
        $save->sale_price = $request->sale_price;
        $save->status = $request->status;
        $save->category = $request->category;
        $save->save();
    
        return redirect('/admin/packages/programme/add/'.$save->id)->with('pid', $save->id);
    }

    public function programme(Request $request, $id)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', $id)->get();
        return view('layouts.admin.packages.addprogramme', $data);
    }
    
    public function save_programme(Request $request)
    {

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
