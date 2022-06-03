<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBannersController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Str;

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
    $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where('packages.status', '=', '1')->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
    $data['packagesoffers'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'],['is_sale','=','1']])->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
    $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id','=','blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();    
    return view('home')->with($data);
});
Route::get('/home', function () {
    $data['company_banners'] = DB::table('company_banners')->select('*')->where('status', '1')->get();    
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['destinations'] = DB::table('destinations')->select('*')->where([['status', '=', '1'],['featured', '=', '1']])->orderBy('created_at', 'desc')->skip(0)->take(2)->get();
    $data['destinations2'] = DB::table('destinations')->select('*')->where([['status', '=', '1'],['featured', '=', '1']])->orderBy('created_at', 'desc')->skip(2)->take(2)->get();
    $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where('packages.status', '=', '1')->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
    $data['packagesoffers'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'],['is_sale','=','1']])->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
    $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id','=','blogs.author')->where("blogs.status", "=", 2)->groupBy('blogs.id')->orderBy("blogs.created_at", "desc")->take(3)->get();    
    return view('home')->with($data);
});

Route::get('/destinations', function () {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['destinations'] = DB::table('destinations')->select('*')->where('status', '1')->orderBy('created_at', 'desc')->get();
    return view('layouts.pages.destinations')->with($data);
})->name('destinations');

Route::get('/packages/details/{link}', function ($link) {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'],['packages.slug', '=', $link]])->get();
    $data['programme'] = DB::table('package_programme')->select('*')->where('package_id', $data['packages'][0]->id)->get();
    $data['gallery'] = DB::table('package_gallery')->select('*')->where('package_id', $data['packages'][0]->id)->get();

    return view('layouts.pages.packagedetails')->with($data);    
})->name('packages.details');

Route::get('/blog/details/{link}', [BlogController::class, 'showfront'])->name('blog.details');

// Route::get('/blog/details/{id}', function () {
//     $data['blogs'] = DB::table('blogs')->select('*')->get();
//     // $data['destinations'] = DB::table('destinations')->select('*')->where('status', '1')->orderBy('created_at', 'desc')->get();
//     return view('layouts.pages.destinations')->with($data);
// })->name('blog.details');

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
