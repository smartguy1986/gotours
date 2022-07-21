<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Str;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['packages'] = DB::table('packages')->select('*')->orderBy('id', 'DESC')->get();
        return view('layouts.admin.packages.lists', $data);
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

    public function add(Request $request)
    {
        $data['destinations'] = DB::table('destinations')->select('*')->get();
        $data['categories'] = DB::table('package_category')->select('*')->get();
        return view('layouts.admin.packages.addpackage', $data);
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
        return view('layouts.admin.packages.editprogramme', $data);
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
    
        $fileName = time().'.'.$request->cat_image->extension();  
        $request->cat_image->move(public_path('images/categories'), $fileName);
  
        $check = DB::table('package_category')->insertGetId(array(
                    'cat_name'      => $request->cat_name,
                    'slug'          => Str::slug($request->cat_name, '-'),
                    'cat_tagline'     => $request->cat_tagline,
                    'cat_image'      => $fileName,
                    'cat_description'   => $request->cat_description,
                    'status'    => $request->status,
                    'created_at' => date("Y-m-d")
                ));
    
        return redirect('/admin/packages/categories')->with('success', 'Destination Has been uploaded');
    }

    public function save_package(Request $request)
    {
        $validatedData = $request->validate([
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
    
        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName1 = time().$pass.'.'.$request->banner->extension();
        $request->banner->move(public_path('images/packages'), $fileName1);

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName2 = time().$pass.'.'.$request->imageURL->extension();
        $request->imageURL->move(public_path('images/packages'), $fileName2);

        $save = new Packages;
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
    
        return redirect('/admin/packages/programme/add/'.$save->id)->with('pid', $save->id);
    }

    public function programme(Request $request, $id)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', $id)->get();
        return view('layouts.admin.packages.addprogramme', $data);
    }
    
    public function save_programme(Request $request)
    {
        $total_loop = $request->total_loop;
        for ($i=0; $i<$total_loop; $i++){
            $data[] = array(
                'package_id' => $request->package_id,    
                'day' => $request->input('day')[$i],
                'title' => $request->input('title')[$i],
                'description' => $request->input('description')[$i]
            );
        }
    
        if(DB::table('package_programme')->insert($data))
        {
            return redirect('/admin/packages')->with('success', 'Programme successfully added');
        }
    }

    public function update_programme(Request $request)
    {
        // dd($request);
        // die();
        $total_loop = $request->total_loop;
        for ($i=0; $i<$total_loop; $i++){
            //echo $request->input('progid')[$i];
            $data = array(
                'package_id' => $request->package_id,    
                'day' => $request->input('day')[$i],
                'title' => $request->input('title')[$i],
                'description' => $request->input('description')[$i]
            );
            if($request->input('progid')[$i]==null){
                echo "empty";
                DB::table('package_programme')->insert($data);
            }
            else {
                echo "not Empty";
                DB::table('package_programme')->where("id", $request->input('progid')[$i])->update($data);
            }
            $data = array();
        }
    
        return redirect('/admin/packages')->with('success', 'Programme successfully added');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
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
    
        if(isset($request->cat_image))
        {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName1 = time().$pass.'.'.$request->cat_image->extension();  
            $request->cat_image->move(public_path('images/categories'), $fileName1);
            $cat_image = $fileName1;
            $file_path = public_path().'/images/categories/'.$request->old_cat_image;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        else
        {
            $cat_image = $request->old_cat_image;
        }
  
        $data = array(
            'cat_name'      => $request->cat_name,
            'slug'          => Str::slug($request->cat_name, '-'),
            'cat_tagline'     => $request->cat_tagline,
            'cat_image'      => $cat_image,
            'cat_description'   => $request->cat_description,
            'status'    => $request->status,
            'created_at' => date("Y-m-d")
        );

        DB::table('package_category')->where("id", $request->id)->update($data);
    
        return redirect('/admin/packages/categories')->with('success', 'Package Category has been Updated');
    }

    public function edit(Packages $packages, $pid)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', '=', $pid)->get();
        $data['destinations'] = DB::table('destinations')->select('*')->get();
        $data['categories'] = DB::table('package_category')->select('*')->get();
        return view('layouts.admin.packages.editpackage', $data);
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
        $validatedData = $request->validate([
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
    
        if(isset($request->banner))
        {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName1 = time().$pass.'.'.$request->banner->extension();  
            $request->banner->move(public_path('images/packages'), $fileName1);
            $banner = $fileName1;
            $file_path = public_path().'/images/packages/'.$request->banner;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        else
        {
            $banner = $request->oldbanner;
        }

        if(isset($request->imageURL))
        {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName2 = time().$pass.'.'.$request->imageURL->extension();  
            $request->imageURL->move(public_path('images/packages'), $fileName2);
            $imageURL = $fileName2;
            $file_path = public_path().'/images/packages/'.$request->imageURL;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        else
        {
            $imageURL = $request->oldimage;
        }

        $data = array(
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
            'contact_person' => $request->contact_person,
            'status' => $request->status,
            'category' => $request->category
        );

        DB::table('packages')->where("id", $request->package_id)->update($data);

        return redirect('/admin/packages/');
    }

    public function show_gallery(Request $request, $pid)
    {
        $data['packages'] = DB::table('packages')->select('*')->where('id', '=', $pid)->get();
        $data['gallery'] = DB::table('package_gallery')->select('*')->where('package_id', '=', $pid)->orderBy('id', 'DESC')->get();
        return view('layouts.admin.packages.addpackagegallery', $data);
    }

    public function save_gallery(Request $request)
    {
        // dd($request->gallery);
        // echo count($request->gallery);
        $validatedData = $request->validate([
            'gallery' => 'required'
        ]);
        
        foreach ($request->gallery as $gallerydata)
        {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName = time().$pass.'.'.$gallerydata->extension();  
            $gallerydata->move(public_path('images/packages/gallery'), $fileName);
            $data = array(
                "package_id" => $request->packageid,
                "imageURL" => $fileName,
            );
            DB::table('package_gallery')->insert($data);
        }

        return redirect('/admin/packages/gallery/show/'.$request->packageid)->with('success', 'Gallery Images successfully added');
    }

    public function delete_gallery(Request $request)
    {
        //dd($request);
        foreach($request->galid as $gmg)
        {
            $imgdata = DB::table('package_gallery')->select('*')->where('id', '=', $gmg)->get();
            //echo $imgdata[0]->imageURL;
            DB::table('package_gallery')->where('id', $gmg)->delete();
            $file_path = public_path().'/images/packages/gallery/'.$imgdata[0]->imageURL;
            if (File::exists($file_path)) {
                unlink($file_path);
            }   
        }

        return redirect('/admin/packages/gallery/show/'.$request->pid)->with('success', 'Images Deleted successfully');
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
