<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use Illuminate\Http\Request;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Blogger::all();
        return view('blogger.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.create');
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
            'title'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);
       if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/blogs/'),$image);
       }

        Blogger::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('blogger.index');
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
        $blog = Blogger::findOrFail($id);
        return view('blogger.edit',compact('blog'));
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
        $blog = Blogger::findOrFail($id);
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
        ]);
        if($request->hasFile('image')){
            $path = public_path('/images/blogs/' . $blog->image);
            if(file_exists($path)){
                unlink($path);
            }
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg'
            ]);
            $file = $request->file('image');
            $ext = $file->extension();
            $img = date('YmdHis') . '.' . $ext;
            $file->move(public_path('/images/blogs/'), $img);
            $blog->image = $img;
        }
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $blog->image,
        ]);
        return redirect()->route('blogger.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blogger::findOrFail($id);

        $path = public_path('/images/blogs/' . $blog->image);
        if(file_exists($path)){
            unlink($path);
        }
        $blog->delete();
        return back();
    }
}
