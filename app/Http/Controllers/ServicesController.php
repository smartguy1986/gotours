<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;

class ServicesController extends Controller
{
    public function index()
    {
        $data['services'] = Services::select('*')->orderBy('id', 'DESC')->get();
        return view('layouts.admin.services.servicelist', $data);
    }

    public function add()
    {
        return view('layouts.admin.services.addservices');
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'srv_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/admin/services')->with('error', $errors);
        }

        $fileName = time() . '.' . $request->srv_image->extension();
        $request->srv_image->move(public_path('images/services'), $fileName);

        $save = new Services;
        $save->title = strtoupper($request->title);
        $save->photo = $fileName;
        $save->description = $request->description;
        $save->status = 1;
        $save->save();

        return redirect('/admin/services')->with('success', 'Service Has been uploaded');
    }
}