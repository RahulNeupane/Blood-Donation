<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'date' => 'required|date',
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/events'), $image);
        }
        Events::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image,
            'date' => $request->date,
            'posted_by'=> auth()->user()->name,
        ]);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::findOrFail($id);
        $now = date('Y-m-d H:i:s');
        if($now <= $event->date){
            $color = 'green';
        }else{
            $color = 'red';
        }
        
        return view('events.view',compact('event','color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('events.edit',compact('event'));
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
        $event = Events::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'date' => 'required|date',
        ]);
        if($request->hasFile('image')){
            $path = public_path('/images/events/' . $event->image);
            if(file_exists($path)){
                unlink($path);
            }
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg',
            ]);
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/events'), $image);
            $event->image = $image;
        }

        $event->update([
            'title' => $request->title,
            'body' => $request->body,
            'date' => $request->date,
            'image' => $event->image,
            'posted_by' => auth()->user()->name,
        ]);
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $path = public_path('/images/events/' . $event->image);
        if(file_exists($path)){
            unlink($path);
        }
        $event->delete();
        return back();
    }
}
