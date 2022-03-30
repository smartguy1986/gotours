<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBannersController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\DestinationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data['company_banners'] = DB::table('company_banners')->select('*')->where('status', '1')->get();
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['destinations'] = DB::table('destinations')->select('*')->where([['status', '=', '1'],['featured', '=', '1']])->orderBy('created_at', 'desc')->skip(0)->take(2)->get();
    $data['destinations2'] = DB::table('destinations')->select('*')->where([['status', '=', '1'],['featured', '=', '1']])->orderBy('created_at', 'desc')->skip(2)->take(2)->get();
    return view('home')->with($data);
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/destinations', function () {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['destinations'] = DB::table('destinations')->select('*')->where('status', '1')->orderBy('created_at', 'desc')->get();
    return view('layouts.pages.destinations')->with($data);
})->name('destinations');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/login');
})->name('logout');

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('user.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    Route::get('/admin/company', [CompanyDetailsController::class, 'index'])->name('company.basic');
    Route::put('/admin/company/update/{id}', [CompanyDetailsController::class, 'update'])->name('company.update');

    Route::get('/admin/company/banners', [CompanyBannersController::class, 'index'])->name('company.banners');
    Route::post('/admin/company/banners/store', [CompanyBannersController::class, 'store'])->name('company.banners.store');
    Route::get('/admin/company/banners/{id}/{filename}', [CompanyBannersController::class, 'delete_banners'])->name('company.banners.delete');

    Route::get('/admin/destinations', [DestinationsController::class, 'index'])->name('destinations.list');
    Route::get('/admin/destinations/add', [DestinationsController::class, 'add'])->name('destinations.add');
    Route::post('/admin/destinations/create', [DestinationsController::class, 'store'])->name('destinations.create');
    Route::get('/admin/destinations/edit/{id}', [DestinationsController::class, 'edit'])->name('destinations.edit');
    Route::post('/admin/destinations/update', [DestinationsController::class, 'update'])->name('destinations.update');
    Route::get('/admin/destinations/disable/{id}', [DestinationsController::class, 'disable'])->name('destinations.disable');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
