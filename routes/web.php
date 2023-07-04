<?php

use App\Http\Controllers\AgenciesController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimonialController;
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
use App\Http\Controllers\FaqsController;
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

Route::get('/destinations', [DestinationsController::class, 'destinationlist'])->name('destinations');

Route::get('/packages', [PackagesController::class, 'getpackageswithajax'])->name('packages');

Route::get('/packages/details/{link}', [PackagesController::class, 'getpackagedetails'])->name('packages.details');

Route::get('/packages-by-theme/{link}', [PackagesController::class, 'packagebytheme'])->name('packages-by-theme');

Route::get('/packages-by-destination/{link}', [PackagesController::class, 'packagedestination'])->name('packages-by-destination');

Route::get('/package-offers', [PackagesController::class, 'packagebyoffer'])->name('package-offers');

Route::get('/blog/details/{link}', [BlogController::class, 'showfront'])->name('blog.details');

Route::get('about-us', [PageController::class, 'aboutus'])->name('about-us');

Route::get('services', [ServicesController::class, 'servicesfront'])->name('servicesfrontpage');

Route::get('testimonials', [TestimonialController::class, 'frontendlists'])->name('testimonialpage');

Route::get('faqs', [FaqsController::class, 'faqlists'])->name('faqpage');

Route::get('careers', [CareersController::class, 'index'])->name('careerhome');
Route::get('careerdetails/{id}', [CareersController::class, 'show'])->name('careerdetails');

Route::get('contact', [ContactsController::class, 'index'])->name('contactpage');

Route::get('tour-operator', [PackagesController::class, 'tourop'])->name('touroperator');


// ============ AJAX Controller ===================================
Route::post('subscribeuser', [AjaxController::class, 'subscription']);
Route::post('jointeam', [AjaxController::class, 'jointeam']);
Route::post('contactsubmit', [AjaxController::class, 'contactsubmit']);
Route::post('careerquery', [AjaxController::class, 'careerquery']);
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

    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonials.list');
    Route::get('/admin/testimonials/add', [TestimonialController::class, 'add'])->name('testimonials.add');
    Route::post('/admin/testimonials/create', [TestimonialController::class, 'store'])->name('testimonials.create');
    Route::get('/admin/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::post('/admin/testimonials/update', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::get('/admin/testimonials/disable/{id}', [TestimonialController::class, 'disable'])->name('testimonials.disable');

    Route::get('/admin/faqs', [FaqsController::class, 'index'])->name('faqs.list');
    Route::get('/admin/faqs/add', [FaqsController::class, 'create'])->name('faqs.add');
    Route::post('/admin/faqs/create', [FaqsController::class, 'store'])->name('faqs.create');
    Route::get('/admin/faqs/edit/{id}', [FaqsController::class, 'edit'])->name('faqs.edit');
    Route::post('/admin/faqs/update', [FaqsController::class, 'update'])->name('faqs.update');
    Route::get('/admin/faqs/disable/{id}', [FaqsController::class, 'disable'])->name('faqs.disable');

    Route::get('/admin/career', [CareersController::class, 'joblist'])->name('career.list');
    Route::get('/admin/career/add', [CareersController::class, 'create'])->name('career.add');
    Route::post('/admin/career/create', [CareersController::class, 'store'])->name('career.create');
    Route::get('/admin/career/edit/{id}', [CareersController::class, 'edit'])->name('career.edit');
    Route::post('/admin/career/update', [CareersController::class, 'update'])->name('career.update');
    Route::get('/admin/career/disable/{id}', [CareersController::class, 'disable'])->name('career.disable');

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

    Route::get('/admin/users', [FaqsController::class, 'index'])->name('user.list');
    Route::get('/admin/user/add', [FaqsController::class, 'create'])->name('user.add');
    Route::post('/admin/user/create', [FaqsController::class, 'store'])->name('user.create');
    Route::get('/admin/user/edit/{id}', [FaqsController::class, 'edit'])->name('user.edit');
    Route::post('/admin/user/update', [FaqsController::class, 'update'])->name('user.update');
    Route::get('/admin/user/disable/{id}', [FaqsController::class, 'disable'])->name('user.disable');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');

    Route::get('/manager/agencies', [AgenciesController::class, 'index'])->name('agencies');
    Route::post('/manager/agencies/save', [AgenciesController::class, 'store'])->name('agencies.save');
    Route::get('/manager/agencies/edit/{id}', [AgenciesController::class, 'edit'])->name('agencies.edit');
    Route::post('/manager/agencies/update', [AgenciesController::class, 'update'])->name('agencies.update');
    Route::get('/manager/agencies/delete/{id}', [AgenciesController::class, 'delete'])->name('agencies.delete');

    Route::get('/manager/packages', [PackagesController::class, 'index'])->name('packages.list.manager');
    Route::get('/manager/packages/add', [PackagesController::class, 'add'])->name('packages.add.manager');
    Route::get('/manager/packages/edit/{id}', [PackagesController::class, 'edit'])->name('packages.edit.manager');
    Route::post('/manager/packages/update', [PackagesController::class, 'update'])->name('packages.update.manager');
    Route::post('/manager/packages/save/package', [PackagesController::class, 'save_package'])->name('packages.save.manager');
   
    Route::get('/manager/packages/programme/add/{id}', [PackagesController::class, 'programme'])->name('packages.programme.add.manager');
    Route::get('/manager/packages/programme/edit/{id}', [PackagesController::class, 'editprog'])->name('packages.programme.editprog.manager');
    Route::post('/manager/packages/programme/save', [PackagesController::class, 'save_programme'])->name('packages.programme.save.manager');
    Route::post('/manager/packages/programme/update', [PackagesController::class, 'update_programme'])->name('packages.programme.update.manager');
    Route::get('/manager/packages/gallery/show/{id}', [PackagesController::class, 'show_gallery'])->name('packages.gallery.show.manager');
    Route::post('/manager/packages/gallery/save', [PackagesController::class, 'save_gallery'])->name('packages.gallery.save.manager');
    Route::post('/manager/packages/gallery/edit/{id}', [PackagesController::class, 'edit_gallery'])->name('packages.gallery.edit.manager');
    Route::post('/manager/packages/gallery/update', [PackagesController::class, 'update_gallery'])->name('packages.gallery.update.manager');
    Route::post('/manager/packages/gallery/delete', [PackagesController::class, 'delete_gallery'])->name('packages.gallery.delete.manager');
});