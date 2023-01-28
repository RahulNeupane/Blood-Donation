<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }
    public function dashboard(){
        return view('dashboard');
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

    public function showchangepassword(){
        return view('changepass');
    }
    public function updatePassword(Request $request){
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
    
    public function allUsers(){
        $users = User::where('role', '=', 0)->get();
        return view('all_users',compact('users'));
    }
    public function viewmore(Request $request,$id){
        $user = User::findOrFail($id);
        return view('view_more',compact('user'));
    }

    public function donate(){
        return view('donate');
    }
    public function donateRequest(Request $request){
        $request->validate([
            'type' => 'integer',
            'userid' => 'integer',
        ]);
        Requests::create([
            'type' => $request->type,
            'userid' => $request->userid,
        ]);
        return redirect()->route('home');
    }
}
