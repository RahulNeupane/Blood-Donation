<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;
use function PHPUnit\Framework\fileExists;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::all();
        return view('gallery.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
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
            'caption'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);
       if($request->hasFile('image')){
        $img = date('YmdHis'). '.'. $request->file('image')->extension();
        Image::make($request->file('image'))->resize(600,600)->save(public_path('/images/gallery/').$img,40);
       }

        Gallery::create([
            'caption' => $request->caption,
            'image' => $img,
        ]);

        return redirect()->route('gallery.index');
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
        $image = Gallery::findOrFail($id);
        return view('gallery.edit',compact('image'));
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
        $image = Gallery::findOrFail($id);
        $request->validate([
            'caption' => 'required|string'
        ]);
        if($request->hasFile('image')){
            $path = public_path('/images/gallery/' . $image->image);
            if(file_exists($path)){
                unlink($path);
            }
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg'
            ]);
            $img = date('YmdHis'). '.'. $request->file('image')->extension();
            Image::make($request->file('image'))->resize(600,600)->save(public_path('/images/gallery/').$img,40);
            $image->image = $img;
        }
        $image->update([
            'caption' => $request->caption,
            'image' => $image->image,
        ]);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);

        $path = public_path('/images/gallery/' . $image->image);
        if(file_exists($path)){
            unlink($path);
        }
        $image->delete();
        return back();
    }
}
