<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
