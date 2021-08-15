<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use App\Models\Comments;
use Auth;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
	public static function  Timeago($date) {
	   $timestamp = strtotime($date);	
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . "s ago ";
	   }
	}
    public function index()
    {
        $categories = Categories::all();
        $blogs = DB::table('blogs')
        ->join('users', 'users.id', '=', 'blogs.u_id')
        ->join('categories', 'categories.id', '=', 'blogs.cat_id')
        ->select('blogs.*', 'users.name', 'categories.title as cat')->orderBy('id', 'DESC')
        ->paginate(6);
        return view('blogs', compact('blogs','categories'));
        

    }
    public static function count_cat($id)
    {
        $countCat = DB::table('blogs')->where('cat_id', $id)->count();
        return $countCat;

    }
    public static function comment_count($bid)
    {
        $count = DB::table('comments')->where('blog_id', $bid)->count();
        return $count;

    }
    public function myblogs()
    {
        $user_id = Auth::user()->id;
        $blogs = DB::table('blogs')
        ->join('users', 'users.id', '=', 'blogs.u_id')
        ->join('categories', 'categories.id', '=', 'blogs.cat_id')
        ->select('blogs.*', 'users.name', 'categories.title as cat')->orderBy('id', 'DESC')
        ->where('blogs.u_id',$user_id)->orderBy('id', 'DESC')
        ->paginate(6);

        return view('myblogs', compact('blogs'));
    }
    public function writeblog()
    {
        $categories = Categories::all();
        return view('write-blog', compact('categories'));
    }
    public function search()
    {
        $search=$_GET['query'];
        // $blogs = Blogs::where('blogs.title','like','%'.$search.'%')->get();
        $categories = Categories::all();
        $blogs = DB::table('blogs')
        ->join('users', 'users.id', '=', 'blogs.u_id')
        ->join('categories', 'categories.id', '=', 'blogs.cat_id')
        ->select('blogs.*', 'users.name', 'categories.title as cat')->
        where('blogs.title','like','%'.$search.'%')->orderBy('id', 'DESC')
        ->get();
        return view('search', compact('blogs','categories'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'title' => 'required | unique:blogs',
            'short_desc' => 'required | max:255 ',
            'image' => 'required | image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $thumbnail = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $thumbnail);
            $image= "$thumbnail";
        }
        $title = $request->input('title');
        $short_desc = $request->input('short_desc');
        $cat_id = $request->input('cat_id');
        $post = $request->input('post');
        DB::table('blogs')->insert([
            'title' => $title,  'short_desc' => $short_desc, 'cat_id' => $cat_id,  'image' => $image, 'u_id' => $user_id, 'post' => $post, 'tags' => ''
        ]);
        // Blogs::create($request->all());

        return redirect("/my-blogs")
            ->with('success', 'Blog is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $categories = Categories::all();
        $blogs = DB::table('blogs')->orderBy('id', 'DESC')->take(3)->get();
        $comments = DB::table('comments')
        ->join('users', 'users.id', '=', 'comments.u_id')->where('comments.blog_id',$id)->get();
        $blog = DB::table('blogs')
        ->join('users', 'users.id', '=', 'blogs.u_id')
        ->join('categories', 'categories.id', '=', 'blogs.cat_id')
        ->select('blogs.*', 'users.name', 'categories.title as cat')
        ->where('blogs.id',$id)->get();
        return view('post', compact('blog','comments','blogs','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::all();
        $blog = DB::table('blogs')->where('id',$id)->first();
        return view('edit_blog', compact('blog','categories'));
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $thumbnail = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $thumbnail);
            $image= "$thumbnail";
        }
        else{
            $image=$request->input('pre_image');
        }
        $title = $request->input('title');
        $short_desc = $request->input('short_desc');
        $cat_id = $request->input('cat_id');
        $post = $request->input('post');
        
        DB::table('blogs')->where('id',$id)->update([
            'title' => $title,  'short_desc' => $short_desc, 'cat_id' => $cat_id,  'image' => $image, 'post' => $post, 'tags' => ''
        ]);
        return back()
        ->with('success', 'Blog is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blogs::where('id', $id)->get();
        $blog->each->delete();
        return redirect("/my-blogs")
            ->with('danger', 'Blog is deleted successfully');
    }
}
