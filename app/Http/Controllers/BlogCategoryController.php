<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = BlogCategory::orderBy('id','asc')->get();
        return view('blogCategory.index',compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogCategory.create');
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
            'category_name' => 'required',
            'category_slug' => 'required|unique:blog_categories',
        ]);

        $obj = new BlogCategory();
        $obj->category_name = $request->category_name;
        $obj->category_slug = $request->category_slug;
        $obj->save();

        return redirect()->route('blogCategory.index')->with("success","Category added succesfully");
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
        $item = BlogCategory::where('id',$id)->first();
        return view('blogCategory.edit',compact('item'));
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
        $request->validate([
            'category_name' => 'required',
            'category_slug' => ['required','alpha_dash',Rule::unique('blog_categories')->ignore($id)],
        ]);

        $obj = BlogCategory::where('id',$id)->first();
        $obj->category_name = $request->category_name;
        $obj->category_slug = $request->category_slug;
        $obj->update();

        return redirect()->route("blogCategory.index")->with("success","Category updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = BlogCategory::where('id',$id)->first();
        $count = Blog::where('blog_category_id',$id)->count();
        if($count==0){
            $obj->delete();
        }else{
            return redirect()->back()->with('error','You cannot delete this category as one or more blogs are related to this category');
        }
        return redirect()->route('blogCategory.index')->with("success","Category deleted succesfully");
    }
}
