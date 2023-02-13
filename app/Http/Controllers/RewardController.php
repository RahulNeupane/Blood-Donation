<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rewards = Reward::all();
        return view('reward.index',compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reward.create');
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
            'point'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);
       if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/reward/'),$image);
       }

        Reward::create([
            'title' => $request->title,
            'point' => $request->point,
            'image' => $image,
        ]);

        return redirect()->route('reward.index')->with('success','Reward item added succesfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        return view('reward.edit',compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $reward = Reward::findOrFail($id);
        $request->validate([
            'title'=>'required|string',
            'point'=>'required|string',
        ]);
      
        if($request->hasFile('image')){
            $path = public_path('/images/reward/' . $reward->image);
            if(file_exists($path)){
                unlink($path);
            }
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg'
            ]);
            $file = $request->file('image');
            $ext = $file->extension();
            $img = date('YmdHis') . '.' . $ext;
            $file->move(public_path('/images/reward/'), $img);
            $reward->image = $img;
        }
        $reward->update([
            'title' => $request->title,
            'point' => $request->point,
            'image' => $reward->image,
        ]);

        return redirect()->route('reward.index')->with('success','Reward item updated succesfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        //
    }
}
