<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use DB;

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
        $save->imageURL = $fileName;
        $save->tagline = $request->tagline;
        $save->description = $request->description;
        $save->head_office_phone = $request->head_office_phone;
        $save->head_office_address = $request->head_office_address;
        $save->status = 1;
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
    public function edit(Destinations $destinations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destinations $destinations)
    {
        //
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
