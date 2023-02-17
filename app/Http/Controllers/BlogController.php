<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Blog::with('rBlogCategory')->orderBy('id','asc')->get();
        return view('blog.index',compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('photo')){
            $image = date('YmdHis'). '.'. $request->file('image')->extension();
            Image::make($request->file('image'))->resize(600,600)->save(public_path('/images/blogs/').$image,40);
       }

       $blog = new Blog();
       $blog->blog_category_id=$request->blog_category_id;
       $blog->title= $request->title;
       $blog->short_description= $request->short_description;
       $blog->description= $request->description;
       $blog->show_comment= $request->show_comment;
       $blog->photo = $image;
       $blog->save();

        return redirect()->route('blog.index')->with("success","Blog added succesfully");
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
        $categories = BlogCategory::all();
        $item = Blog::where('id',$id)->first();
        return view('blog.edit',compact('item','categories'));
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
        $blog=Blog::where('id',$id)->first();
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('photo')){
            if(file_exists(public_path('images/blogs/'.$blog->photo))){
                unlink(public_path('images/blogs/'.$blog->photo));
            }

            $request->validate([
                'photo' => 'required|image|mimes:png,jpg,jpeg'
            ]);

            $image = date('YmdHis'). '.'. $request->file('image')->extension();
            Image::make($request->file('image'))->resize(600,600)->save(public_path('/images/blogs/').$image,40);
            $blog->photo = $image;
       }

       $blog->blog_category_id=$request->blog_category_id;
       $blog->title= $request->title;
       $blog->short_description= $request->short_description;
       $blog->description= $request->description;
       $blog->show_comment= $request->show_comment;
       $blog->update();

        return redirect()->route('blog.index')->with("success","Blog Updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where('id',$id)->first();
        if(file_exists(public_path('images/blogs/'.$blog->photo))){
            unlink(public_path('images/blogs/'.$blog->photo));
        }
        $blog->delete();
        return redirect()->route('blog.index')->with("success","Category deleted succesfully");
    }

    public function pending_comments(){
        $pending = Comment::where('status',0)->with('rBlog')->get();
        return view('blog.pending_comment',compact('pending'));
    }
    public function approved_comments(){
        $approved = Comment::where('status',1)->with('rBlog')->get();
        return view('blog.approved_comment',compact('approved'));
    }

    public function approve_comment($id){
        $cmt = Comment::where('id',$id)->first();
        $cmt->status = 1;
        $cmt->update();
        return back()->with("success","Comment Approved succesfully");
    }
    public function recheck_comment($id){
        $cmt = Comment::where('id',$id)->first();
        $cmt->status = 0;
        $cmt->update();
        return back()->with("success","Comment Sent for Recheck succesfully");
    }
    public function delete_comment($id){
        $cmt = Comment::where('id',$id)->first();
        $cmt->delete();
        return back()->with("success","Comment deleted succesfully");
    }
    public function pending_reply(){
        $pending = Reply::where('status',0)->with('rComment')->with('rBlog')->get();
        return view('blog.pending_reply',compact('pending'));
    }
    public function approved_reply(){
        $approved = Reply::where('status',1)->with('rComment')->with('rBlog')->get();
        return view('blog.approved_reply',compact('approved'));
    }

    public function approve_reply($id){
        $cmt = Reply::where('id',$id)->first();
        $cmt->status = 1;
        $cmt->update();
        return back()->with("success","Reply Approved succesfully");
    }
    public function recheck_reply($id){
        $cmt = Reply::where('id',$id)->first();
        $cmt->status = 0;
        $cmt->update();
        return back()->with("success","Reply Sent for Recheck succesfully");
    }
    public function delete_reply($id){
        $cmt = Reply::where('id',$id)->first();
        $cmt->delete();
        return back()->with("success","Reply deleted succesfully");
    }
}
