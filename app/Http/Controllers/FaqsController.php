<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\BlogController;
use Validator;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faqs'] = Faqs::select('*')->orderBy('id', 'DESC')->get();
        return view('layouts.admin.faqs.faqlist', $data);
    }

    public function faqlists(CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['destinations'] = $destinationsController->index();
        $data['faqs1'] = Faqs::select('*')->where('category', '1')->orderBy('id', 'DESC')->get();
        $data['faqs2'] = Faqs::select('*')->where('category', '2')->orderBy('id', 'DESC')->get();
        return view('layouts.pages.faqpage', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.faqs.addfaqs');
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
            'category' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/admin/faqs')->with('error', $errors);
        }

        $save = new Faqs;
        $save->category = $request->category;
        $save->question = $request->question;
        $save->answer = $request->answer;
        $save->status = '1';
        $save->save();

        return redirect('/admin/faqs')->with('success', 'FAQ Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faqs, $id)
    {
        $data['faqs'] = Faqs::select('*')->where('id', $id)->get();
        return view('layouts.admin.faqs.editfaqs', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqs  $faqser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqs $faqs)
    {
        $validatedData = Validator::make($request->all(), [
            'category' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/admin/faqs')->with('error', $errors);
        }

        $values = array('category' => $request->category, 'question' => $request->question, 'answer' => $request->answer);

        $affected_row = Faqs::where('id', $request->faqid)->update($values);

        if ($affected_row) {
            return redirect('/admin/faqs')->with('success', 'Faq successfully updated');
        } else {
            return redirect('/admin/faqs')->with('error', 'Faq not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqs $faqs)
    {
        //
    }
}