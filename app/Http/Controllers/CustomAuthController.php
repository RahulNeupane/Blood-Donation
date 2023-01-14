<?php

namespace App\Http\Controllers;

use App\Models\Blood_Group;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function index(){
        if(!auth()->user()?true:false){
            return view('auth.login');
        }else{
            return back();
        }
    }
     
    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            if(auth()->user()->role == 1){
                return view('dashboard');
            }else{
                return view('index');
            }
        }else{
            return redirect()->back()->with('fail', 'email or password invalid !');  
        }
    }
    public function register(){
        if(!auth()->user()?true:false){
            return view('auth.register');
        }else{
            return back();
        }
    }

    public function customRegister(Request $request){
        $request->validate([
            'name'=> 'required|regex:/^[a-z A-Z]+$/u',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:6|max:12',
            'district' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|regex:/^[0-9]/|min:9|max:10|unique:users,phone',
            'age' => 'required|integer|between:18,80',
            'group'=> 'required|not_in:0',
            'gender'=> 'required|not_in:0',
            'image' => 'required|image|mimes:png,jpeg,jpg',
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images'), $image);
        }
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'district' => $request->district,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'group'=> $request->group,
            'gender'=> $request->gender,
            'image' => $image,
        ]);

        return redirect()->route('login');
    }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function changepass(Request $request){
        $request->validate([
            'current_password'=> 'required|string',
            'password'=> 'required|string|min:6|max:12|confirmed'
        ]);
        $curPassStatus = Hash::check($request->current_password, auth()->user()->password);
        if($curPassStatus){
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('success', 'Password updated succesfully');
        }else{
            return redirect()->back()->with('fail', 'Current Password not matched');
        }
    }
}
