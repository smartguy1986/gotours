<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Backtrace\File;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;
use Validator;
use Auth;
use Session;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 'manager') {
            $aid = session::get('managerData')->id;
            if (Session::get('managerData')) {
                $data['managerData'] = Session::get('managerData')->agency_name;
            }
            $data['packages'] = DB::table('packages')->select('packages.*', 'agencies.agency_name')->leftJoin('agencies', 'agencies.id', '=', 'packages.agency_id')->orderBy('packages.id', 'DESC')->where('packages.agency_id', $aid)->get();
            return view('layouts.manager.packages.lists', $data);
        } else {
            $data['packages'] = DB::table('packages')->select('packages.*', 'agencies.agency_name')->leftJoin('agencies', 'agencies.id', '=', 'packages.agency_id')->orderBy('packages.id', 'DESC')->get();
            return view('layouts.admin.packages.lists', $data);
        }

    }

    public function last3package()
    {
        return DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where('packages.status', '=', '1')->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
    }

    public function last3packageoffers()
    {
        return DB::table('packages')->select('packages.*', 'destinations.name', 'destinations.slug as dname')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'], ['is_sale', '=', '1']])->orderBy('packages.created_at', 'desc')->skip(0)->take(3)->get();
    }

    public function packagecat()
    {
        return DB::table('package_category')->selectRaw("package_category.*, COUNT('packages.id') AS dest")->join('packages', 'package_category.id', '=', 'packages.category')->where('package_category.status', '=', '1')->groupBy('package_category.id')->skip(0)->take(6)->get();
    }

    public function getpackageswithajax(Request $request, CompanyController $companyController, BlogController $blogController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();

        $results = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where('packages.status', '=', '1')->orderBy('packages.created_at', 'desc')->paginate(6);

        if ($request->ajax()) {
            $view = view('layouts.pages.packagesdata', compact('results'))->render();
            $data['packages'] = $view;
            return response()->json(['packages' => $view]);
        }

        return view('layouts.pages.packages')->with($data);
    }

    public function getpackagedetails($link, BlogController $blogController, CompanyController $companyController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();
        $data['packages'] = DB::table('packages')->select('packages.*', 'destinations.name')->join('destinations', 'destinations.id', '=', 'packages.destination')->where([['packages.status', '=', '1'], ['packages.slug', '=', $link]])->get();
        $data['programme'] = DB::table('package_programme')->select('*')->where('package_id', $data['packages'][0]->id)->get();
        $data['gallery'] = DB::table('package_gallery')->select('*')->where('package_id', $data['packages'][0]->id)->get();

        return view('layouts.pages.packagedetails')->with($data);
    }

    public function tourop(Request $request, BlogController $blogController, CompanyController $companyController)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();

        $resultso = DB::table('agencies')->select('*')->where('status', '=', '1')->orderBy('agencies.created_at', 'desc')->paginate(6);

        if ($request->ajax()) {
            $view = view('layouts.pages.operators', compact('resultso'))->render();
            $data['agencies'] = $view;
            return response()->json(['agencies' => $view]);
        }

        return view('layouts.pages.touroperators')->with($data);
    }
    public function packagebytheme($link, Request $request, CompanyController $companyController, BlogController $blogController)
    {
        // dd($request);
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();

        $results2 = DB::table('packages')
            ->select('packages.*', 'destinations.name', 'destinations.id', 'package_category.cat_name')
            ->join('destinations', 'destinations.id', '=', 'packages.destination')
            ->join('package_category', 'package_category.id', '=', 'packages.category')
            ->where([['packages.status', '=', '1'], ['package_category.slug', '=', $link]])
            ->orderBy('packages.created_at', 'desc')
            ->paginate(6);
        $data['themename'] = $results2[0]->cat_name;
        if ($request->ajax()) {
            $view = view('layouts.pages.packagebytheme', compact('results2'))->render();
            $data['package'] = $view;
            return response()->json(['packagetheme' => $view]);
        }
        return view('layouts.pages.themepackages')->with($data);
    }

    public function packagedestination(Request $request, CompanyController $companyController, BlogController $blogController, $dslug)
    {
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();

        $resultsd = DB::table('packages')
            ->select('packages.*', 'destinations.name as dname', 'destinations.id', 'destinations.imageURL as destimg')
            ->join('destinations', 'destinations.id', '=', 'packages.destination')
            ->where([['packages.status', '=', '1'], ['destinations.slug', '=', $dslug]])
            ->orderBy('packages.created_at', 'desc')
            ->paginate(6);
        if (count($resultsd) > 0) {
            $data['banner'] = $resultsd[0]->destimg;
            $data['destname'] = $resultsd[0]->dname;
        } else {
            $data['destname'] = ucfirst($dslug);
            $data['banner'] = 'destination-banner.jpg';
        }
        if ($request->ajax()) {
            $view = view('layouts.pages.packagebydestination', compact('resultsd'))->render();
            $data['packages'] = $view;
            return response()->json(['packagedesti' => $view]);
        }
        return view('layouts.pages.destinationpackages')->with($data);
    }

    public function packagebyoffer(Request $request, CompanyController $companyController, BlogController $blogController)
    {
        // dd($request);
        $data['company_details'] = $companyController->commonComponent();
        $data['blogs'] = $blogController->last3blogs();

        $results3 = DB::table('packages')
            ->select('packages.*', 'destinations.name', 'destinations.slug as dname')
            ->join('destinations', 'destinations.id', '=', 'packages.destination')
            ->where([['packages.status', '=', '1'], ['packages.is_sale', '=', '1']])
            ->orderBy('packages.created_at', 'desc')
            ->paginate(6);

        if ($request->ajax()) {
            $view = view('layouts.pages.packagebyoffer', compact('results3'))->render();
            $data['packages'] = $view;
            return response()->json(['packageoffer' => $view]);
        }
        return view('layouts.pages.packageoffers')->with($data);
    }


    public function category()
    {
        $data['categories'] = DB::table('package_category')->select('*')->get();
        return view('layouts.admin.packages.catlists', $data);
    }

    public function addcategory()
    {
        $data['categories'] = DB::table('package_category')->select('*')->get();
        return view('layouts.admin.packages.addcat', $data);
    }

    public function editprog(Request $request, $id)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', $id)->get();
        // $data['destinations'] = DB::table('destinations')->select('*')->get();
        // $data['categories'] = DB::table('package_category')->select('*')->get();
        $data['programms'] = DB::table('package_programme')->select('*')->where('package_id', $id)->get();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        if (Auth::user()->type == 'manager') {
            return view('layouts.manager.packages.editprogramme', $data);
        } else {
            return view('layouts.admin.packages.editprogramme', $data);
        }
    }

    public function save_category(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required',
            'cat_tagline' => 'required',
            'cat_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'cat_description' => 'required',
            'status' => 'required',
        ]);

        $fileName = time() . '.' . $request->cat_image->extension();
        $request->cat_image->move(public_path('images/categories'), $fileName);

        $check = DB::table('package_category')->insertGetId(
            array(
                'cat_name' => $request->cat_name,
                'slug' => Str::slug($request->cat_name, '-'),
                'cat_tagline' => $request->cat_tagline,
                'cat_image' => $fileName,
                'cat_description' => $request->cat_description,
                'status' => $request->status,
                'created_at' => date("Y-m-d")
            )
        );

        return redirect('/admin/packages/categories')->with('success', 'Destination Has been uploaded');
    }

    public function edit_category(Packages $packages, $cid)
    {
        // $data['packages'] = DB::table('packages')->select('*')->where('id', '=', $pid)->get();
        // $data['destinations'] = DB::table('destinations')->select('*')->get();
        $data['categories'] = DB::table('package_category')->select('*')->where('id', '=', $cid)->get();
        return view('layouts.admin.packages.editcat', $data);
    }

    public function update_category(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required',
            'cat_tagline' => 'required',
            'cat_description' => 'required',
            'status' => 'required',
        ]);

        if (isset($request->cat_image)) {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName1 = time() . $pass . '.' . $request->cat_image->extension();
            $request->cat_image->move(public_path('images/categories'), $fileName1);
            $cat_image = $fileName1;
            $file_path = public_path() . '/images/categories/' . $request->old_cat_image;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $cat_image = $request->old_cat_image;
        }

        $data = array(
            'cat_name' => $request->cat_name,
            'slug' => Str::slug($request->cat_name, '-'),
            'cat_tagline' => $request->cat_tagline,
            'cat_image' => $cat_image,
            'cat_description' => $request->cat_description,
            'status' => $request->status,
            'created_at' => date("Y-m-d")
        );

        DB::table('package_category')->where("id", $request->id)->update($data);

        return redirect('/admin/packages/categories')->with('success', 'Package Category has been Updated');
    }

    public function add(Request $request)
    {
        $data['destinations'] = DB::table('destinations')->select('*')->get();
        $data['categories'] = DB::table('package_category')->select('*')->get();
        if (Session::get('managerData')) {
            $data['managerData'] = Session::get('managerData');
        }
        if (Auth::user()->type == 'manager') {
            return view('layouts.manager.packages.addpackage', $data);
        } else {
            return view('layouts.admin.packages.addpackage', $data);
        }
    }

    public function save_package(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'agency_id' => 'required',
            'title' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'imageURL' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'days' => 'required',
            'nights' => 'required',
            'mingroup' => 'required',
            'destinations' => 'required',
            'descriptions' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
            'is_sale' => 'required',
            'status' => 'required',
            'category' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect('/admin/packages/add')->with('errors', $errors);
        }

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName1 = time() . $pass . '.' . $request->banner->extension();
        $request->banner->move(public_path('images/packages'), $fileName1);

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName2 = time() . $pass . '.' . $request->imageURL->extension();
        $request->imageURL->move(public_path('images/packages'), $fileName2);

        $save = new Packages;
        $save->agency_id = $request->agency_id;
        $save->title = strtoupper($request->title);
        $save->slug = Str::slug($request->title, '-');
        $save->tagline = $request->tagline;
        $save->banner = $fileName1;
        $save->imageURL = $fileName2;
        $save->days = $request->days;
        $save->nights = $request->nights;
        $save->mingroup = $request->mingroup;
        $save->destination = $request->destinations;
        $save->descriptions = $request->descriptions;
        $save->contact_person = $request->contact_person;
        $save->phone = $request->phone;
        $save->address = $request->address;
        $save->price = $request->price;
        $save->is_sale = $request->is_sale;
        $save->sale_price = $request->sale_price;
        $save->status = $request->status;
        $save->category = $request->category;
        $save->save();

        if (Auth::user()->type == 'manager') {
            return redirect('/manager/packages/programme/add/' . $save->id)->with('pid', $save->id);
        } else {
            return redirect('/admin/packages/programme/add/' . $save->id)->with('pid', $save->id);
        }

    }

    public function programme(Request $request, $id)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', $id)->get();
        if (Auth::user()->type == 'manager') {
            return view('layouts.manager.packages.addprogramme', $data);
        } else {
            return view('layouts.admin.packages.addprogramme', $data);
        }
        
    }

    public function save_programme(Request $request)
    {
        $total_loop = $request->total_loop;
        for ($i = 0; $i < $total_loop; $i++) {
            $data[] = array(
                'package_id' => $request->package_id,
                'day' => $request->input('day')[$i],
                'title' => $request->input('title')[$i],
                'description' => $request->input('description')[$i]
            );
        }

        if (DB::table('package_programme')->insert($data)) {
            if (Auth::user()->type == 'manager') {
                return redirect('/manager/packages')->with('success', 'Programme successfully added');
            } else {
                return redirect('/admin/packages')->with('success', 'Programme successfully added');
            }

        }
    }

    public function update_programme(Request $request)
    {
        // dd($request);
        // die();
        $total_loop = $request->total_loop;
        for ($i = 0; $i < $total_loop; $i++) {
            //echo $request->input('progid')[$i];
            $data = array(
                'package_id' => $request->package_id,
                'day' => $request->input('day')[$i],
                'title' => $request->input('title')[$i],
                'description' => $request->input('description')[$i]
            );
            if ($request->input('progid')[$i] == null) {
                echo "empty";
                DB::table('package_programme')->insert($data);
            } else {
                echo "not Empty";
                DB::table('package_programme')->where("id", $request->input('progid')[$i])->update($data);
            }
            $data = array();
        }

        if (Auth::user()->type == 'manager') {
            return redirect('/manager/packages')->with('success', 'Programme successfully added');
        } else {
            return redirect('/admin/packages')->with('success', 'Programme successfully added');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */

    public function edit(Packages $packages, $pid)
    {
        $data['packages'] = Packages::select('*')->where('id', '=', $pid)->get();
        $data['destinations'] = DB::table('destinations')->select('*')->get();
        $data['categories'] = DB::table('package_category')->select('*')->get();
        $data['agencies'] = DB::table('agencies')->select('*')->orderBy('agency_name', 'ASC')->get();

        if (Auth::user()->type == 'manager') {
            return view('layouts.manager.packages.editpackage', $data);
        } else {
            return view('layouts.admin.packages.editpackage', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        $validatedData = validator::make($request->all(), [
            'agency_id' => 'required',
            'title' => 'required',
            'tagline' => 'required',
            'banner' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'imageURL' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'days' => 'required',
            'nights' => 'required',
            'mingroup' => 'required',
            'destinations' => 'required',
            'descriptions' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
            'is_sale' => 'required',
            'status' => 'required',
            'category' => 'required'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            if (Auth::user()->type == 'manager') {
                return redirect('/manager/packages/edit/' . $request->package_id)->with('errors', $errors);
            } else {
                return redirect('/admin/packages/edit/' . $request->package_id)->with('errors', $errors);
            }
        }

        if (isset($request->banner)) {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName1 = time() . $pass . '.' . $request->banner->extension();
            $request->banner->move(public_path('images/packages'), $fileName1);
            $banner = $fileName1;
            $file_path = public_path() . '/images/packages/' . $request->banner;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $banner = $request->oldbanner;
        }

        if (isset($request->imageURL)) {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName2 = time() . $pass . '.' . $request->imageURL->extension();
            $request->imageURL->move(public_path('images/packages'), $fileName2);
            $imageURL = $fileName2;
            $file_path = public_path() . '/images/packages/' . $request->imageURL;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $imageURL = $request->oldimage;
        }

        $data = array(
            'agency_id' => $request->agency_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'tagline' => $request->tagline,
            'banner' => $banner,
            'imageURL' => $imageURL,
            'days' => $request->days,
            'nights' => $request->nights,
            'mingroup' => $request->mingroup,
            'destination' => $request->destinations,
            'descriptions' => $request->descriptions,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'address' => $request->address,
            'price' => $request->price,
            'is_sale' => $request->is_sale,
            'sale_price' => $request->sale_price,
            'status' => $request->status,
            'category' => $request->category
        );

        DB::table('packages')->where("id", $request->package_id)->update($data);

        if (Auth::user()->type == 'manager') {
            return redirect('/manager/packages/')->with('success', 'Package updated Successfully');
        } else {
            return redirect('/admin/packages/')->with('success', 'Package updated Successfully');
        }
    }

    public function show_gallery(Request $request, $pid)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', '=', $pid)->get();
        $data['gallery'] = DB::table('package_gallery')->select('*')->where('package_id', '=', $pid)->orderBy('id', 'DESC')->get();
        if (Auth::user()->type == 'manager') {
            return view('layouts.manager.packages.addpackagegallery', $data);
        } else {
            return view('layouts.admin.packages.addpackagegallery', $data);
        }
    }

    public function save_gallery(Request $request)
    {
        // dd($request->gallery);
        // echo count($request->gallery);
        $validatedData = $request->validate([
            'gallery' => 'required'
        ]);

        foreach ($request->gallery as $gallerydata) {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName = time() . $pass . '.' . $gallerydata->extension();
            $gallerydata->move(public_path('images/packages/gallery'), $fileName);
            $data = array(
                "package_id" => $request->packageid,
                "imageURL" => $fileName,
            );
            DB::table('package_gallery')->insert($data);
        }

        if (Auth::user()->type == 'manager') {
            return redirect('/manager/packages/gallery/show/' . $request->packageid)->with('success', 'Gallery Images successfully added');
        } else {
            return redirect('/admin/packages/gallery/show/' . $request->packageid)->with('success', 'Gallery Images successfully added');
        }
    }

    public function delete_gallery(Request $request)
    {
        //dd($request);
        foreach ($request->galid as $gmg) {
            $imgdata = DB::table('package_gallery')->select('*')->where('id', '=', $gmg)->get();
            //echo $imgdata[0]->imageURL;
            DB::table('package_gallery')->where('id', $gmg)->delete();
            $file_path = public_path() . '/images/packages/gallery/' . $imgdata[0]->imageURL;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }

        return redirect('/admin/packages/gallery/show/' . $request->pid)->with('success', 'Images Deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $packages)
    {
        //
    }
}