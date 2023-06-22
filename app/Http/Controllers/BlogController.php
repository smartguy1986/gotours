<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Backtrace\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = DB::table('blogs')->select('blogs.*', 'users.name', 'users.email')->join('users', 'users.id','=','blogs.author')->orderBy('blogs.id', 'DESC')->get();
        return view('layouts.admin.blogs.lists', $data);
    }

    public function last3blogs()
    {
        return DB::table("blogs")->selectRaw("blogs.*, COUNT('blog_comment.blog_id') AS totcm, users.name")->leftjoin("blog_comment", "blog_comment.blog_id", "=", "blogs.id")->leftjoin('users', 'users.id', '=', 'blogs.author')->where("blogs.status", "=", '2')->groupBy('blogs.id')->orderBy("blogs.id", "desc")->take(3)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['destinations'] = DB::table('destinations')->select('*')->get();
        return view('layouts.admin.blogs.addblog', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // die();
        $validatedData = $request->validate([
            'blog_image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'short_desc' => 'required',
            'blog_content' => 'required',
            'tags' => 'required'
        ]);
    
        if(!empty($request->blog_banner))
        {
            $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
            $fileName1 = time().$pass.'.'.$request->blog_banner->extension();  
            $request->blog_banner->move(public_path('images/blogs'), $fileName1);
        }

        $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $fileName2 = time().$pass.'.'.$request->blog_image->extension();  
        $request->blog_image->move(public_path('images/blogs'), $fileName2);

        $trimtag = trim($request->tags[0],'"');

        $save = new Blog;
        $save->blog_category = $request->blog_category;
        $save->title = $request->title;
        $save->slug = Str::slug($request->title, '-');
        $save->short_desc = $request->short_desc;
        if(!empty($request->blog_banner)) { $save->blog_banner = $fileName1; }
        $save->blog_image = $fileName2;
        $save->author = 1;
        $save->views = 0;
        $save->tags = json_encode(explode(",", $trimtag));
        
        $save->blog_content = $request->blog_content;
        $save->status = '2';
        if($save->save())
        {
            return redirect('/admin/blog')->with('success', 'Blog added successfully');
        }
        else
        {
            return redirect('/admin/blog')->with('error', 'Blog not added');
        }
    
        
    }

    public function showfront(Request $request, $link)
    {
        $data['company_details'] = DB::table('company_details')->select('*')->get();

        $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, users.name, users.bio")->leftjoin('users', 'users.id','=','blogs.author')->where('blogs.slug','=',$link)->get();

        $data['blog_comments'] = DB::table("blog_comment")->selectRaw("blog_comment.*")->where('blog_comment.blog_id','=',$data['blogs'][0]->id)->get();

        $data['related_blogs'] = DB::table("blogs")->select("blogs.*")->where("blogs.status", "=", "2")->where("blogs.id", "!=", $data['blogs'][0]->id)->groupBy('blogs.id')->orderBy("blogs.id", "DESC")->inRandomOrder()->limit(4)->get();
        return view('layouts.pages.blogdetails', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['company_details'] = DB::table('company_details')->select('*')->get();

        $data['blogs'] = DB::table("blogs")->selectRaw("blogs.*, users.name, users.bio")->leftjoin('users', 'users.id','=','blogs.author')->where('blogs.id','=',$id)->get();

        $data['blog_comments'] = DB::table("blog_comment")->selectRaw("blog_comment.*")->where('blog_comment.blog_id','=',$id)->get();

        $data['related_blogs'] = DB::table("blogs")->select("blogs.*")->where("blogs.status", "=", "2")->where("blogs.id", "!=", $id)->groupBy('blogs.id')->orderBy("blogs.id", "DESC")->inRandomOrder()->limit(4)->get();

        return view('layouts.admin.blogs.editblog', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'blog_content' => 'required',
            'tags' => 'required'
        ]);
    
        if(isset($request->blog_banner))
        {
            $fileName = time().'.'.$request->blog_banner->extension();  
            $request->blog_banner->move(public_path('images/blogs'), $fileName);
            $file_path = public_path().'/images/blogs/'.$request->old_blog_banner;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        else
        {
            $fileName = $request->old_blog_banner;
        }

        if(isset($request->blog_image))
        {
            $fileName2 = time().'.'.$request->blog_image->extension();  
            $request->blog_image->move(public_path('images/blogs'), $fileName2);
            $file_path = public_path().'/images/blogs/'.$request->old_blog_image;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        else
        {
            $fileName2 = $request->old_blog_image;
        }

        $trimtag = trim($request->tags[0],'"');
        
        $data = array(
            'blog_category' => $request->blog_category, 
            'blog_banner' => $fileName,
            'blog_image' => $fileName2,   
            'title' => $request->title,  
            'slug' => Str::slug($request->title, '-'),
            'author' => '1',
            'tags' => json_encode(explode(",", $trimtag)),
            'short_desc' => $request->short_desc,
            'blog_content' => $request->blog_content
        );

        DB::table('blogs')->where("id", $request->id)->update($data);

        return redirect('/admin/blog')->with('success', 'Blog updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
