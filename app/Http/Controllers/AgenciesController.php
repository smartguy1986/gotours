<?php

namespace App\Http\Controllers;

use App\Models\Agencies;
use Illuminate\Http\Request;
use Auth;
use Validator;
use File;
use Str;

class AgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data['agencies'] = Agencies::select('*')->where('manager_id', $id)->first();
        return view('layouts.manager.agency.agencydetails', $data);
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
        $validatedData = Validator::make($request->all(), [
            'manager_id' => 'required',
            'agency_name' => 'required',
            'agency_bio' => 'required',
            'agency_description' => 'required',
            'agency_email' => 'required|email',
            'agency_phone' => 'required',
            'agency_address' => 'required',
            'agency_contact' => 'required',
            'agency_gstnumber' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/manager/agencies')->with('error', $errors);
        }

        $fileName1 = time() . '.' . $request->agn_image->extension();
        $request->agn_image->move(public_path('images/agencies'), $fileName1);

        $fileName2 = time() + 1 . '.' . $request->agnb_image->extension();
        $request->agnb_image->move(public_path('images/agencies'), $fileName2);

        $save = new Agencies;
        $save->agency_id = strtoupper(Str::random(8));
        $save->manager_id = $request->manager_id;
        $save->agency_name = $request->agency_name;
        $save->agency_logo = $fileName1;
        $save->agency_banner = $fileName2;
        $save->agency_bio = $request->agency_bio;
        $save->agency_description = $request->agency_description;
        $save->agency_email = $request->agency_email;
        $save->agency_phone = $request->agency_phone;
        $save->agency_address = $request->agency_address;
        $save->agency_contact = $request->agency_contact;
        $save->agency_gstnumber = $request->agency_gstnumber;
        $save->status = '1';
        $save->save();

        return redirect('/manager/agencies')->with('success', 'Agency Details updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agencies  $agencies
     * @return \Illuminate\Http\Response
     */
    public function show(Agencies $agencies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agencies  $agencies
     * @return \Illuminate\Http\Response
     */
    public function edit(Agencies $agencies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agencies  $agencies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agencies $agencies)
    {
        $validatedData = Validator::make($request->all(), [
            'agency_name' => 'required',
            'agency_bio' => 'required',
            'agency_description' => 'required',
            'agency_email' => 'required|email',
            'agency_phone' => 'required',
            'agency_address' => 'required',
            'agency_contact' => 'required',
            'agency_gstnumber' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/manager/agencies')->with('error', $errors);
        }

        if ($request->agn_image) {
            $fileName1 = time() . '.' . $request->agn_image->extension();
            $request->agn_image->move(public_path('images/agencies'), $fileName1);
            $file_path = public_path() . '/images/agencies/' . $request->old_agn;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $fileName1 = $request->old_agn;
        }

        if ($request->agnb_image) {
            $fileName2 = time() + 1 . '.' . $request->agnb_image->extension();
            $request->agnb_image->move(public_path('images/agencies'), $fileName2);
            $file_path = public_path() . '/images/agencies/' . $request->old_agnb;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $fileName2 = $request->old_agnb;
        }

        $values = array(
            'agency_name' => $request->agency_name,
            'agency_logo' => $fileName1,
            'agency_banner' => $fileName2,
            'agency_bio' => $request->agency_bio,
            'agency_description' => $request->agency_description,
            'agency_email' => $request->agency_email,
            'agency_phone' => $request->agency_phone,
            'agency_address' => $request->agency_address,
            'agency_contact' => $request->agency_contact,
            'agency_gstnumber' => $request->agency_gstnumber
        );

        $affected_row = Agencies::where('id', $request->agn_id)->update($values);

        if ($affected_row) {
            return redirect('/manager/agencies')->with('success', 'Agency Details successfully updated');
        } else {
            return redirect('/manager/agencies')->with('error', 'Agency details not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agencies  $agencies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agencies $agencies)
    {
        //
    }
}