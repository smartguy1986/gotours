<?php

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

Route::get('/packages', function (Request $request, CompanyController $companyController, PackagesController $packagesController, BlogController $blogController) {
    $data['company_details'] = $companyController->commonComponent();
    $data['packages'] = $packagesController->getpackageswithajax($request);
    $data['blogs'] = $blogController->last3blogs();
    return view('layouts.pages.packages')->with($data);
})->name('packages');

Route::get('/packages/details/{link}', function ($link, BlogController $blogController) {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'], ['packages.slug', '=', $link]])->get();
    $data['programme'] = DB::table('package_programme')->select('*')->where('package_id', $data['packages'][0]->id)->get();
    $data['gallery'] = DB::table('package_gallery')->select('*')->where('package_id', $data['packages'][0]->id)->get();
    $data['blogs'] = $blogController->last3blogs();
    return view('layouts.pages.packagedetails')->with($data);
})->name('packages.details');

Route::get('/packages-by-theme/{link}', function (Request $request, $link) {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $results = DB::table('packages')
        ->select('packages.*', 'destinations.name', 'destinations.id', 'package_category.cat_name')
        ->join('destinations', 'destinations.id', '=', 'packages.destination')
        ->join('package_category', 'package_category.id', '=', 'packages.category')
        ->where([['packages.status', '=', '1'], ['package_category.slug', '=', $link]])
        ->orderBy('packages.created_at', 'desc')
        ->paginate(6);
    if ($request->ajax()) {
        $html = '';
        foreach ($results as $post) {
            $html .= '
            <div class="col-lg-4 col-md-6">
                <div class="package-wrap">
                <figure class="feature-image">
                    <a href="/packages/details/' . $post->slug . '">
                        <img src="/images/packages/' . $post->imageURL . '" alt="' . $post->title . '" class="package-image">
                    </a>
                </figure>
                <div class="package-price">
                    <h6>
                        <span>&#8377; ' . number_format($post->price) . '</span> / per person
                    </h6>
                </div>
                <div class="package-content-wrap">
                    <div class="package-meta text-center">
                        <ul>
                            <li>
                            <i class="far fa-clock"></i>
                            ' . $post->days . ' D/' . $post->nights . ' N
                            </li>
                            <li>
                            <i class="fas fa-user-friends"></i>
                            ' . $post->mingroup . '
                            </li>
                            <li>
                            <i class="fas fa-map-marker-alt"></i>
                            ' . $post->title . '
                            </li>
                        </ul>
                    </div>
                    <div class="package-content">
                        <h3>
                            <a href="/packages/details/' . $post->slug . '">' . $post->title . '</a>
                        </h3>
                        <div class="review-area">
                            <span class="review-text">(25 reviews)</span>
                            <div class="rating-start" title="Rated 5 out of 5">
                            <span style="width: 60%"></span>
                            </div>
                        </div>
                        <p>' . substr($post->descriptions, 0, 200) . '</p>
                        <div class="btn-wrap">
                            <a href="/packages/details/' . $post->slug . '" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                            <a href="/packages/details/' . $post->id . '" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            ';
        }

        return $html;
    }
    $data['packages'] = $results;
    $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id', '=', 'blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();
    return view('layouts.pages.themepackages')->with($data);
})->name('packages-by-theme');

Route::get('/packages-by-destination/{link}', function (Request $request, $link) {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $results = DB::table('packages')
        ->select('packages.*', 'destinations.name as dname', 'destinations.id')
        ->join('destinations', 'destinations.id', '=', 'packages.destination')
        ->where([['packages.status', '=', '1'], ['destinations.slug', '=', $link]])
        ->orderBy('packages.created_at', 'desc')
        ->paginate(6);
    if ($request->ajax()) {
        $html = '';
        foreach ($results as $post) {
            $html .= '
            <div class="col-lg-4 col-md-6">
                <div class="package-wrap">
                <figure class="feature-image">
                    <a href="/packages/details/' . $post->slug . '">
                        <img src="/images/packages/' . $post->imageURL . '" alt="' . $post->title . '" class="package-image">
                    </a>
                </figure>
                <div class="package-price">
                    <h6>
                        <span>&#8377; ' . number_format($post->price) . '</span> / per person
                    </h6>
                </div>
                <div class="package-content-wrap">
                    <div class="package-meta text-center">
                        <ul>
                            <li>
                            <i class="far fa-clock"></i>
                            ' . $post->days . ' D/' . $post->nights . ' N
                            </li>
                            <li>
                            <i class="fas fa-user-friends"></i>
                            ' . $post->mingroup . '
                            </li>
                            <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="wraptext">' . $post->title . '</span>
                            </li>
                        </ul>
                    </div>
                    <div class="package-content">
                        <h3>
                            <a href="/packages/details/' . $post->slug . '">' . $post->title . '</a>
                        </h3>
                        <div class="review-area">
                            <span class="review-text">(25 reviews)</span>
                            <div class="rating-start" title="Rated 5 out of 5">
                            <span style="width: 60%"></span>
                            </div>
                        </div>
                        <p>' . substr($post->descriptions, 0, 200) . '</p>
                        <div class="btn-wrap">
                            <a href="/packages/details/' . $post->slug . '" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
                            <a href="/packages/details/' . $post->id . '" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            ';
        }

        return $html;
    }
    $data['packages'] = $results;
    $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id', '=', 'blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();
    return view('layouts.pages.destinationpackages')->with($data);
})->name('packages-by-destination');


Route::get('/package-offers', function (Request $request) {
    $data['company_details'] = DB::table('company_details')->select('*')->get();
    $results = DB::table('packages')
        ->select('packages.*', 'destinations.name', 'destinations.slug as dname')
        ->join('destinations', 'destinations.id', '=', 'packages.destination')
        ->where([['packages.status', '=', '1'], ['packages.is_sale', '=', '1']])
        ->orderBy('packages.created_at', 'desc')
        ->paginate(6);
    if ($request->ajax()) {
        $html = '';
        foreach ($results as $pckg) {
            $html .= '
            <div class="col-md-6 col-lg-4">
               <div class="special-item">
                  <figure class="special-img">
                     <img src="/images/packages/' . $pckg->imageURL . '" alt="' . $pckg->title . '">
                  </figure>
                  <div class="badge-dis">
                     <span>
                        <strong>' . number_format(((($pckg->price - $pckg->sale_price) / $pckg->price) * 100), 0) . ' %</strong>
                        off
                     </span>
                  </div>
                  <div class="special-content">
                     <div class="meta-cat">
                        <a href="/packages-by-destination/' . $pckg->dname . '">' . $pckg->name . '</a>
                     </div>
                     <h3>
                        <a href="/packages/details/' . $pckg->slug . '">' . $pckg->title . '</a>
                     </h3>
                     <div class="package-price">
                        Price:
                        <del>&#8377; ' . number_format($pckg->price) . '</del>
                        <ins>&#8377; ' . number_format($pckg->sale_price) . '</ins>
                     </div>
                  </div>
               </div>
            </div>
            ';
        }

        return $html;
    }
    $data['packages'] = $results;
    $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id', '=', 'blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();
    return view('layouts.pages.packageoffers')->with($data);
})->name('package-offers');

Route::get('/blog/details/{link}', [BlogController::class, 'showfront'])->name('blog.details');

Route::get('about-us', [PageController::class, 'aboutus'])->name('about-us');



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
