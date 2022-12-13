<?php

namespace App\Http\Controllers;

use App\Models\Blood_Group;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function register(){
        $bg = Blood_Group::all();
        return view('register',compact('bg'));
    }
}
