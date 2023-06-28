<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['testimonials'] = Testimonial::select('*')->orderBy('id', 'DESC')->get();
        return view('layouts.admin.testimonials.testimonialslist', $data);
    }

    public function frontendlists(Request $request, CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController)
    {
        // $data['company_details'] = $companyController->commonComponent();
        // $data['destinations'] = $destinationsController->index();
        // $data['blogs'] = $blogController->last3blogs();
        // $data['testimonials'] = Testimonial::select('*')->orderBy('id', 'DESC')->get();
        // return view('layouts.pages.testimonialpage', $data);
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['destinations'] = $destinationsController->index();

        $results = Testimonial::select('*')->orderBy('id', 'DESC')->paginate(6);

        if ($request->ajax()) {
            $view = view('layouts.pages.testimonialpageloop', compact('results'))->render();
            $data['testimonials'] = $view;
            return response()->json(['testimonials' => $view]);
        }

        return view('layouts.pages.testimonialpage')->with($data);
    }

    public function add(Request $request)
    {
        return view('layouts.admin.testimonials.addtestimonials');
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
            'name' => 'required',
            'occupation' => 'required',
            'rating' => 'required',
            'tst_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/admin/testimonials')->with('error', $errors);
        }

        $fileName = time() . '.' . $request->tst_image->extension();
        $request->tst_image->move(public_path('images/testimonials'), $fileName);

        $save = new Testimonial;
        $save->name = $request->name;
        $save->occupation = $request->occupation;
        $save->rating = $request->rating;
        $save->photo = $fileName;
        $save->description = $request->description;
        $save->status = 1;
        $save->save();

        return redirect('/admin/testimonials')->with('success', 'Testimonial Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}