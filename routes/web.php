<?php

use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBannersController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/destinations', function (CompanyController $companyController, DestinationsController $destinationsController, BlogController $blogController) {
    $data['company_details'] = $companyController->commonComponent();
    $data['destinations'] = $destinationsController->index();
    $data['blogs'] = $blogController->last3blogs();
    return view('layouts.pages.destinations')->with($data);
})->name('destinations');

Route::get('/packages', [PackagesController::class, 'getpackageswithajax'])->name('packages');

Route::get('/packages/details/{link}', function ($link, BlogController $blogController) {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'], ['packages.slug', '=', $link]])->get();
    $data['programme'] = DB::table('package_programme')->select('*')->where('package_id', $data['packages'][0]->id)->get();
    $data['gallery'] = DB::table('package_gallery')->select('*')->where('package_id', $data['packages'][0]->id)->get();
    $data['blogs'] = $blogController->last3blogs();
    return view('layouts.pages.packagedetails')->with($data);
})->name('packages.details');

Route::get('/packages-by-theme/{link}', [PackagesController::class, 'packagebytheme'])->name('packages-by-theme');

Route::get('/packages-by-destination/{link}', [PackagesController::class, 'packagedestination'])->name('packages-by-destination');

Route::get('/package-offers', [PackagesController::class, 'packagebyoffer'])->name('package-offers');

Route::get('/blog/details/{link}', [BlogController::class, 'showfront'])->name('blog.details');

Route::get('about-us', [PageController::class, 'aboutus'])->name('about-us');
Route::get('services', [PageController::class, 'aboutus'])->name('about-us');



// ============ AJAX Controller ===================================
Route::post('subscribeuser', [AjaxController::class, 'subscription']);
// ================================================================

Route::get('logout', function () {
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

    Route::get('/admin/destinations', [DestinationsController::class, 'adminlist'])->name('destinations.list');
    Route::get('/admin/destinations/add', [DestinationsController::class, 'add'])->name('destinations.add');
    Route::post('/admin/destinations/create', [DestinationsController::class, 'store'])->name('destinations.create');
    Route::get('/admin/destinations/edit/{id}', [DestinationsController::class, 'edit'])->name('destinations.edit');
    Route::post('/admin/destinations/update', [DestinationsController::class, 'update'])->name('destinations.update');
    Route::get('/admin/destinations/disable/{id}', [DestinationsController::class, 'disable'])->name('destinations.disable');

    Route::get('/admin/services', [ServicesController::class, 'index'])->name('services.list');
    Route::get('/admin/services/add', [ServicesController::class, 'add'])->name('services.add');
    Route::post('/admin/services/create', [ServicesController::class, 'store'])->name('services.create');
    Route::get('/admin/services/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
    Route::post('/admin/services/update', [ServicesController::class, 'update'])->name('services.update');
    Route::get('/admin/services/disable/{id}', [ServicesController::class, 'disable'])->name('services.disable');

    Route::get('/admin/packages', [PackagesController::class, 'index'])->name('packages.list');
    Route::get('/admin/packages/add', [PackagesController::class, 'add'])->name('packages.add');
    Route::get('/admin/packages/edit/{id}', [PackagesController::class, 'edit'])->name('packages.edit');
    Route::post('/admin/packages/update', [PackagesController::class, 'update'])->name('packages.update');
    Route::get('/admin/packages/categories', [PackagesController::class, 'category'])->name('packages.catlist');
    Route::get('/admin/packages/add/category', [PackagesController::class, 'addcategory'])->name('packages.add.category');
    Route::post('/admin/packages/save/category', [PackagesController::class, 'save_category'])->name('packages.save.category');
    Route::post('/admin/packages/save/package', [PackagesController::class, 'save_package'])->name('packages.save');
    Route::get('/admin/packages/programme/add/{id}', [PackagesController::class, 'programme'])->name('packages.programme.add');
    Route::get('/admin/packages/programme/edit/{id}', [PackagesController::class, 'editprog'])->name('packages.programme.editprog');
    Route::post('/admin/packages/programme/save', [PackagesController::class, 'save_programme'])->name('packages.programme.save');
    Route::post('/admin/packages/programme/update', [PackagesController::class, 'update_programme'])->name('packages.programme.update');
    Route::get('/admin/packages/gallery/show/{id}', [PackagesController::class, 'show_gallery'])->name('packages.gallery.show');
    Route::post('/admin/packages/gallery/save', [PackagesController::class, 'save_gallery'])->name('packages.gallery.save');
    Route::post('/admin/packages/gallery/edit/{id}', [PackagesController::class, 'edit_gallery'])->name('packages.gallery.edit');
    Route::post('/admin/packages/gallery/update', [PackagesController::class, 'update_gallery'])->name('packages.gallery.update');
    Route::post('/admin/packages/gallery/delete', [PackagesController::class, 'delete_gallery'])->name('packages.gallery.delete');

    Route::get('/admin/packages/category/edit/{id}', [PackagesController::class, 'edit_category'])->name('categories.edit');
    Route::post('/admin/packages/update_category', [PackagesController::class, 'update_category'])->name('packages.update.category');
    Route::get('/admin/packages/category/disable{id}', [PackagesController::class, 'index'])->name('categories.disable');

    Route::get('/admin/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/admin/blog/add', [BlogController::class, 'create'])->name('blog.add');
    Route::post('/admin/blog/save', [BlogController::class, 'store'])->name('blog.save');
    Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/admin/blog/update', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
