<?php

namespace App\Http\Controllers;

use App\Models\Wishlists;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class WishlistsController extends Controller
{
    public function __construct()
    {
        if (!Auth::User()) {
            return Redirect::back()->with('error', 'Please login to wishlisht');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $pid)
    {
        if (!Auth::User()) {
            return Redirect::back()->with('error', 'Please login to wishlist tour packages!');
        }

        $data['results'] = Wishlists::where('user_id', $pid)->get();
        return view('layouts.user.userwishlist', $data);
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
     * @param  \App\Models\Wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function showwishlist(Wishlists $wishlists, CompanyController $companyController, BlogController $blogController, $uid)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        // dd($uid);
        return view('layouts.pages.wishlistpage', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlists $wishlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlists $wishlists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlists  $wishlists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlists $wishlists)
    {
        //
    }
}