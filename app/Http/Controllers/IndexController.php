<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Blogger;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Requests;
use App\Models\Reward;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('id','Desc')->limit(3)->get();
        $images = Gallery::orderBy('id','Desc')->limit(6)->get();
        return view('index',compact('blogs','images'));
    }
    public function blogs(){
        $blogs = Blog::orderBy('id','desc')->paginate(3);
        return view('blogs',compact('blogs'));
    }
    public function blog_detail($id){
        $blogs = Blog::orderBy('id','desc')->limit(5)->get();
        $categories = BlogCategory::limit(10)->get();
        $blog = Blog::where('id',$id)->first();
        $comments = Comment::with('rReply')->where('status',1)->get();
        $count = Comment::where('status',1)->count();
        return view('blog_detail',compact('blog','categories','blogs','comments','count'));
    }
    public function category($id){
        $category = BlogCategory::where('id',$id)->first();
        $blogs = Blog::where('blog_category_id',$id)->paginate(6);
        return view('category',compact('category','blogs'));
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
            if(file_exists(public_path('/images/user/').auth()->user()->image)){
                unlink(public_path('/images/user/') . auth()->user()->image);
            }
            $file = $request->file('image');
            $extension = $file->extension();
            $image = date('YmdHis') . '.' . $extension;
            $file->move(public_path('/images/user'), $image);
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
            'password'=> 'required|string|min:4|max:12|confirmed'
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
        $users = User::where('role', '=', 2)->get();
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
        $date = Requests::where('userid','=',auth()->user()->id)->orderBy('id','Desc')->first();
       if($date){
        $diff = today()->diffInDays($date->updated_at);
        $left = 90 - $diff;
       }

        if(!$date || $diff>90){
            $request->validate([
                'type' => 'integer',
                'userid' => 'integer',
            ]);
            Requests::create([
                'type' => $request->type,
                'userid' => $request->userid,
            ]);
            return redirect()->route('home');
        } else{
            return back()->with('fail',"You can donate once in every 3 months ( $left days left) !");
        }  
    }
    public function rewards_show(){
        $rewards = Reward::orderBy('id','desc')->paginate(3);
        return view('reward',compact('rewards'));
    }

    public function receive(){
        return view('receive');
    }
    public function receiveRequest(Request $request){
        $date = Requests::where('userid','=',auth()->user()->id)->orderBy('id','Desc')->first();
       if($date){
        $diff = today()->diffInDays($date->updated_at);
        $left = 90 - $diff;
       }

        if(!$date || $diff>90){
            $request->validate([
                'type' => 'integer',
                'userid' => 'integer',
            ]);
            Requests::create([
                'type' => $request->type,
                'userid' => $request->userid,
            ]);
            return redirect()->route('home');
        } else{
            return back()->with('fail',"You can donate once in every 3 months ( $left days left) !");
        }  
    }
}
