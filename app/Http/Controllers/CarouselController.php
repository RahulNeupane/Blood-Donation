<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Image;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::limit(4)->get();
        return view('carousel.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousel.create');
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
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        if ($request->hasFile('image')) {
            $img = date('YmdHis') . '.' . $request->file('image')->extension();
            Image::make($request->file('image'))->save(public_path('/images/carousel/') . $img, 80);
        }

        $carousel = new Carousel();
        $carousel->image = $img;
        $carousel->save();

        return redirect()->route('carousel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = public_path('/images/carousel/' . $carousel->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg'
            ]);

            $img = date('YmdHis') . '.' . $request->file('image')->extension();
            Image::make($request->file('image'))->save(public_path('/images/carousel/') . $img, 80);
            $carousel->image = $img;
        }

  
        $carousel->update();

        return redirect()->route('carousel.index');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);

        $path = public_path('/images/carousel/' . $carousel->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $carousel->delete();
        return back();
    }
}
