<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }
    public function events(){
        return view('events');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function changepass(){
        return view('changepass');
    }
    
    public function viewProfile(){
        return view('view_profile',);
    }
    public function editProfile(){
        return view('edit_profile');
    }
    public function updateProfile(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $request->validate([
            'name'=> 'required|regex:/^[a-z A-Z]+$/u',
            'district' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|integer|between:18,80',
            'gender'=> 'required',
        ]);
        if($user->email!=$request->email){
            $request->validate([
                'email'=> 'required|email|unique:users,email',
            ]);
        }
        if($user->phone!=$request->phone){
            $request->validate([
                'phone' => 'required|regex:/^[0-9]/|min:9|max:10|unique:users,phone',
            ]);
        }

        if($request->hasFile('image')){
            $request->validate([
            'image' => 'required|image|mimes:png,jpeg,jpg',
            ]);
            if(file_exists(public_path('/images/').auth()->user()->image)){
                unlink(public_path('/images/') . auth()->user()->image);
            }
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images'), $image);
            $user->image = $image;
        }
        $user->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'district' => $request->district,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender'=> $request->gender,
            'image' => $user->image,
        ]);

        return redirect()->route('viewProfile');
    }
}
