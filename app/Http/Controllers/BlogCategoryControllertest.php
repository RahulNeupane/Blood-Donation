<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    public function index(){
        $all_data = BlogCategory::orderBy('id','asc')->get();
        return view('blogCategory.index',compact('all_data'));
    }
    public function create(){
        return view('blogCategory.create');
    }
    public function store(Request $request){
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
    public function edit($id){
        $item = BlogCategory::where('id',$id)->first();
        return view('blogCategory.edit',compact('item'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'category_name' => 'required',
            'category_slug' => ['required','alpha_dash',Rule::unique('blog_categories')->ignore($id)],
        ]);

        $obj = BlogCategory::where('id',$id)->first();
        $obj->category_name = $request->category_name;
        $obj->category_slug = $request->category_slug;
        $obj->update();

        return redirect()->route('blogCategory.index')->with("success","Category updated succesfully");
    }

    public function delete($id){
        $obj = BlogCategory::where('id',$id)->first();
        $obj->delete();
        return redirect()->route('blogCategory.index')->with("success","Category deleted succesfully");
    }
}
