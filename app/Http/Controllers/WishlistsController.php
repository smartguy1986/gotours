<?php

namespace App\Http\Controllers;

use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use DB;

class WishlistsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (!auth()->check()) {
    //             return redirect('login')->with('error', 'Please login to make a wishlist');
    //         }

    //         return $next($request);
    //     });
    // }
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
    public function create(Request $request, $pid): RedirectResponse
    {
        $uid = null; // Initialize with a default value

        if (Auth::check()) {
            $uid = Auth::user()->id;

            $records = Wishlists::where('user_id', $uid)->where('package_id', $pid)->first();

            if ($records) {
                return Redirect::back()->with('success', 'Package already added to your wishlist');
            } else {
                $check = Wishlists::insert(
                    array(
                        'user_id' => $uid,
                        'package_id' => $pid
                    )
                );
                if ($check) {
                    return Redirect::back()->with('success', 'Package added to your wishlist');
                } else {
                    return Redirect::back()->with('error', 'Error. Please try again!');
                }
            }
        } else {
            return Redirect::back()->with('error', 'Login to wishlisht package');
        }
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
    public function showwishlist(Wishlists $wishlists, CompanyController $companyController, BlogController $blogController)
    {
        $uid = Auth::user()->id;
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();

        $result = DB::table('wishlists')
            ->select('wishlists.*', 'packages.*', 'destinations.name', 'destinations.slug as dname')
            ->join('packages', 'packages.id', '=', 'wishlists.package_id')
            ->join('destinations', 'destinations.id', '=', 'packages.destination')
            ->where('wishlists.user_id', $uid)
            ->orderBy('packages.created_at', 'desc')
            ->get();

        $data['packages'] = $result;
        // dd($result);
        return view('layouts.pages.wishlistpage', $data);
    }

    public function whishlistremove(Request $request, $packageId)
    {
        $userId = Auth::user()->id;
        $wishlist = Wishlists::where('user_id', $userId)
            ->where('package_id', $packageId)
            ->first();

        if ($wishlist) {
            // Delete the wishlist record
            $wishlist->delete();
            return Redirect::back()->with('success', 'Wishlist deleted successfully.');
        } else {
            return Redirect::back()->with('error', 'Wishlist not found.');
        }
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