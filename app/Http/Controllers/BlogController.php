<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            $file = $request->file('photo');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/blogs/'),$image);
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

            $file = $request->file('photo');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/blogs/'),$image);
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
}
