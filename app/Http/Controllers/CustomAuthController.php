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
        return view('auth.login');
    }
     
    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect('/home');
        }else{
            return redirect()->back()->with('fail', 'email or password invalid !');  
        }
    }
    public function register(){
        return view('auth.register');
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

        return Redirect('login');
    }
}
