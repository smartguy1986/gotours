<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\BlogController;
use Session;
use Validator;
use File;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['destinations'] = $destinationsController->index();
        $data['careers'] = Careers::select('*')->orderBy('created_at', 'DESC')->get();
        return view('layouts.pages.careerpage', $data);
    }

    public function joblist()
    {
        $data['careers'] = Careers::select('*')->orderBy('created_at', 'DESC')->get();
        return view('layouts.admin.career.jobslist', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.career.addjobs');
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
            'post' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'vacancy' => 'required',
            'description' => 'required',
            'experience' => 'required',
            'requirement' => 'required',
            'job_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            Session::flash('error', $errors);
            return redirect('/admin/career');
        }

        $fileName = time() . '.' . $request->job_image->extension();
        $request->job_image->move(public_path('images/careers'), $fileName);

        $save = new Careers;
        $save->post = $request->post;
        $save->type = $request->type;
        $save->salary = $request->salary;
        $save->vacancy = $request->vacancy;
        $save->photo = $fileName;
        $save->description = $request->description;
        $save->experience = $request->experience;
        $save->requirement = $request->requirement;
        $save->status = '1';
        $save->save();

        Session::flash('success', 'Job Has been posted');
        return redirect('/admin/career');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController, Careers $careers, $id)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['destinations'] = $destinationsController->index();
        $data['careers'] = Careers::select('*')->where('id', $id)->get();
        return view('layouts.pages.careerdetailpage', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function edit(Careers $careers, $id)
    {
        $data['careers'] = Careers::select('*')->where('id', $id)->get();
        return view('layouts.admin.career.editjobs', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Careers $careers)
    {
        $validatedData = Validator::make($request->all(), [
            'post' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'vacancy' => 'required',
            'description' => 'required',
            'experience' => 'required',
            'requirement' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            Session::flash('error', $errors);
            return redirect('/admin/career');
        }

        if (isset($request->job_image)) {
            $fileName = time() . '.' . $request->job_image->extension();
            $request->job_image->move(public_path('images/careers'), $fileName);

            if ($request->old_image) {
                $file_path = public_path() . '/images/careers/' . $request->old_image;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
            }
        } else {
            $fileName = $request->old_image;
        }

        $values = array('post' => $request->post, 'type' => $request->type, 'salary' => $request->salary, 'vacancy' => $request->vacancy, 'description' => $request->description, 'experience' => $request->experience, 'requirement' => $request->requirement, 'photo' => $fileName);

        $affected_row = Careers::where('id', $request->jobid)->update($values);

        if ($affected_row) {
            Session::flash('success', 'Job successfully updated');
            return redirect('/admin/career');
        } else {
            Session::flash('success', 'Job not updated');
            return redirect('/admin/career');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Careers $careers)
    {
        //
    }
}