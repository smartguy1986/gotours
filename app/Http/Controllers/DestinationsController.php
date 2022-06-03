<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use File;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['destinations'] = DB::table('destinations')->select('*')->get();
        return view('layouts.admin.destinations.lists', $data);
    }

    public function add()
    {
        return view('layouts.admin.destinations.adddest');
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
            'name' => 'required',
            'tagline' => 'required',
            'dst_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
            'head_office_phone' => 'required',
            'head_office_address' => 'required'
        ]);
    
        $fileName = time().'.'.$request->dst_image->extension();  
        $request->dst_image->move(public_path('images/destinations'), $fileName);

        $save = new Destinations;
        $save->name = strtoupper($request->name);
        $save->slug = Str::slug($request->name, '-');
        $save->imageURL = $fileName;
        $save->tagline = $request->tagline;
        $save->description = $request->description;
        $save->head_office_phone = $request->head_office_phone;
        $save->head_office_address = $request->head_office_address;
        $save->status = 1;
        $save->featured = $request->featured;
        $save->save();
    
        return redirect('/admin/destinations')->with('success', 'Destination Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function show(Destinations $destinations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function edit(Destinations $destinations, $id)
    {
        $data['destinations'] = DB::table('destinations')->select('*')->where('id', $id)->get();
        return view('layouts.admin.destinations.editdest', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   

        //$User_Update = User::where("id", '2')->update(["member_type" => $plan]);
        if(isset($request->dst_image))
        {
            $fileName = time().'.'.$request->dst_image->extension();  
            $request->dst_image->move(public_path('images/destinations'), $fileName);
            $file_path = public_path().'/images/destinations/'.$request->old_image;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        else
        {
            $fileName = $request->old_image;
        }

        $values = array('name' => strtoupper($request->name), 'slug' => Str::slug($request->name, '-'), 'tagline' => $request->tagline, 'head_office_address' => $request->head_office_address, 'head_office_phone' => $request->head_office_phone, 'description' => $request->description, 'featured' => $request->featured, 'imageURL' => $fileName);

        $affected_row = Destinations::where('id', $request->dstid)->update($values);
        
        if($affected_row)
        {
            return redirect('/admin/destinations')->with('success', 'Destination successfully updated');
        }
        else
        {
            return redirect('/admin/destinations')->with('error', 'Destination not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destinations $destinations)
    {
        //
    }
}
