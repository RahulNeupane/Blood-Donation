<?php

namespace App\Http\Controllers;

use App\Models\Blood_Group;
use App\Models\District;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function register(){
        $bg = Blood_Group::all();
        $districts = District::all();
        return view('register',compact('bg','districts'));
    }
}
