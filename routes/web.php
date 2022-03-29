<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBannersController;
use App\Http\Controllers\CompanyDetailsController;
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
    return view('home')->with($data);
});
Route::get('/home', function () {
    return view('home');
});

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
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
