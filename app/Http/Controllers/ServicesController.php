<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
use File;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\BlogController;

class ServicesController extends Controller
{
    public function index()
    {
        $data['services'] = Services::select('*')->orderBy('id', 'DESC')->get();
        return view('layouts.admin.services.servicelist', $data);
    }

    public function servicespage()
    {
        $data = Services::select('*')->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function servicesfront(CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController, ServicesController $servicesController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['destinations'] = $destinationsController->index();
        $data['blogs'] = $blogController->last3blogs();
        $data['services'] = $servicesController->servicespage();
        return view('layouts.pages.servicespage', $data);
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

    public function edit($id)
    {
        $data['services'] = Services::select('*')->where('id', $id)->get();
        return view('layouts.admin.services.editservices', $data);
    }

    public function update(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/admin/services')->with('error', $errors);
        }

        if (isset($request->srv_image)) {
            $fileName = time() . '.' . $request->srv_image->extension();
            $request->srv_image->move(public_path('images/services'), $fileName);
            $file_path = public_path() . '/images/services/' . $request->old_image;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $fileName = $request->old_image;
        }

        $values = array('title' => $request->title, 'description' => $request->description, 'photo' => $fileName);

        $affected_row = Services::where('id', $request->srvid)->update($values);

        if ($affected_row) {
            return redirect('/admin/services')->with('success', 'Services successfully updated');
        } else {
            return redirect('/admin/services')->with('error', 'Services not updated');
        }
    }
}