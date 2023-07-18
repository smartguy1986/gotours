<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile()
    {
        $uid = Auth::user()->id;
        $data['user'] = DB::connection('mysql')->table('users')->select('*')->where('id', $uid)->first();
        return view('layouts.user.userprofile', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'phonenum' => 'required',
            'address' => 'required',
            'bio' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/user/profile')->with('errors', $errors);
        }

        if (isset($request->new_img)) {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName = time() . $pass . '.' . $request->new_img->extension();
            $request->new_img->move(public_path('/images/users/'), $fileName);
            if ($request->old_img) {
                $file_path = public_path() . '/images/users/' . $request->old_img;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $fileName = $request->oldimage;
        }

        $data = array(
            'name' => $request->name,
            'dob' => $request->dob,
            'phonenum' => $request->phonenum,
            'address' => $request->address,
            'bio' => $request->bio,
            'profileimage' => $fileName
        );

        if (DB::connection('mysql')->table('users')->where("id", $request->uid)->update($data)) {
            return redirect('/user/profile/')->with('success', 'profile updated Successfully');
        } else {
            return redirect('/user/profile/')->with('error', 'profile not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}