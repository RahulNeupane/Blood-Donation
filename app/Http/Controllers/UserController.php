<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name'=> 'required|regex:/^[a-z A-Z]+$/u',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:4|max:12',
            'district' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|regex:/^[0-9]/|min:9|max:10',
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

}
