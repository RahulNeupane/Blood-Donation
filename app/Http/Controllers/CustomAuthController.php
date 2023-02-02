<?php
namespace App\Http\Controllers;

use App\Mail\Websitemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active'
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');

            if(Auth::guard('web')->user()->role == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            $data = User::where('email', $request->email)->first();
            if($data AND $data->status == 'Pending' ){
                return back()->with('fail','email not verified!');
            }
            return back()->with('fail','email or password invalid!');
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function registration_submit(Request $request)
    {
        $request->validate([
            'name'=> 'required|regex:/^[a-z A-Z]+$/u',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:4',
            'retype_password'=> 'required|same:password',
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
            $file->move(public_path('/images/user'), $image);
        }

        $token = hash('sha256',time());
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->district = $request->district;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->group = $request->group;
        $user->gender = $request->gender;
        $user->image = $image;
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();

        $verification_link = url('registration/verify/'.$token.'/'.$request->email);
        $subject = 'Registration Confirmation';
        $message = 'Please click on this link: <br><a href="'.$verification_link.'">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        echo 'confirm your email to contine';

    }

    public function registration_verify($token,$email)
    {
        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user)
        {
            return redirect()->route('login');
        }

        $user->status = 'Active';
        $user->token = '';
        $user->update();

        echo 'Registration is successful';
    }

    public function forget_password()
    {
        return view('auth.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        
        $token = hash('sha256',time());

        $user = User::where('email',$request->email)->first();
        if(!$user) {
            return back()->with('fail','email not found!');
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return back()->with('success','A password reset link has been sent to your email !');
    }

    public function reset_password($token,$email)
    {
        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user) {
            return redirect()->route('login');
        }

        return view('auth.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password'=> 'required|min:4',
            'retype_password'=> 'required|same:password',
        ]);
        $user = User::where('token', $request->token)->where('email', $request->email)->first();

        $user->token = '';
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('forget_password')->with('success', 'Password reset success!');

    }

    public function showchangepass(){
        return view('auth.changepass');
    }
    public function changepass(Request $request){
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
}
