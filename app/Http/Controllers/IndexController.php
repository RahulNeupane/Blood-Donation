<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BloodRequest;
use App\Models\Carousel;
use App\Models\Comment;
use App\Models\Events;
use App\Models\Gallery;
use App\Models\Requests;
use App\Models\Reward;
use App\Models\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'Desc')->limit(3)->get();
        $images = Gallery::orderBy('id', 'Desc')->limit(6)->get();
        $carousels = Carousel::limit(3)->get();
        $donors = Requests::with('users')->orderBy('id', 'Desc')->limit(4)->get();
        return view('index', compact('blogs', 'images', 'carousels', 'donors'));
    }
    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        return view('blogs', compact('blogs'));
    }
    public function blog_search(Request $request)
    {
        $blogs = Blog::search($request->search)->paginate(6);
        if ($blogs->total() == 0) {
            return redirect()->route('blogs')->with('error', 'No blog with title "' . $request->search . '"');
        }
        return view('blogs', compact('blogs'));
    }
    public function blog_detail($id)
    {
        $blogs = Blog::orderBy('id', 'desc')->limit(5)->get();
        $categories = BlogCategory::limit(10)->get();
        $blog = Blog::where('id', $id)->first();
        $comments = Comment::with('rReply')->where('status', 1)->where('blog_id', $blog->id)->get();
        $count = Comment::where('status', 1)->where('blog_id', $blog->id)->count();
        return view('blog_detail', compact('blog', 'categories', 'blogs', 'comments', 'count'));
    }
    public function events()
    {
        $events = Events::orderBy('id', 'desc')->paginate(6);
        return view('events', compact('events'));
    }
    public function event_search(Request $request)
    {
        $events = Events::search($request->search)->paginate(6);
        if ($events->total() == 0) {
            return redirect()->route('events')->with('error', 'No event with title "' . $request->search . '"');
        }
        return view('events', compact('events'));
    }
    public function event_detail($id)
    {
        $event = Events::where('id', $id)->first();
        $now = date('Y-m-d H:i:s');
        if ($now <= $event->date) {
            $color = 'green';
        } else {
            $color = '#CF3D3C';
        }
        return view('event_detail', compact('event', 'color'));
    }
    public function category($id)
    {
        $category = BlogCategory::where('id', $id)->first();
        $blogs = Blog::where('blog_category_id', $id)->paginate(6);
        return view('category', compact('category', 'blogs'));
    }
    public function dashboard()
    {
        $donor_count = Requests::where('approve', '0')->count();
        $blood_request_count = BloodRequest::where('approve', '0')->count();
        $users = User::where('role', 2)->count();
        $donate = Requests::orderBy('id','desc')->limit(5)->get();
        $receive = BloodRequest::orderBy('id','desc')->limit(5)->get();

        return view('dashboard', compact('donor_count', 'blood_request_count', 'users','donate','receive'));
    }

    public function viewProfile()
    {
        return view('view_profile',);
    }
    public function editProfile()
    {
        return view('edit_profile');
    }
    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $request->validate([
            'name' => 'required|regex:/^[a-z A-Z]+$/u',
            'district' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|integer|between:18,80',
            'gender' => 'required',
        ]);
        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'required|email|unique:users,email',
            ]);
        }
        if ($user->phone != $request->phone) {
            $request->validate([
                'phone' => 'required|regex:/^[0-9]/|min:9|max:10|unique:users,phone',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpeg,jpg',
            ]);
            if (file_exists(public_path('/images/user/') . auth()->user()->image)) {
                unlink(public_path('/images/user/') . auth()->user()->image);
            }
            $image = date('YmdHis') . '.' . $request->file('image')->extension();
            Image::make($request->file('image'))->resize(600, 600)->save(public_path('/images/user/') . $image, 40);

            $user->image = $image;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'district' => $request->district,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'image' => $user->image,
        ]);

        return redirect()->route('viewProfile');
    }

    public function showchangepassword()
    {
        return view('changepass');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:4|max:12|confirmed'
        ]);
        $curPassStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($curPassStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('success', 'Password updated succesfully');
        } else {
            return redirect()->back()->with('fail', 'Current Password not matched');
        }
    }

    public function allUsers()
    {
        $users = User::where('role', '=', 2)->whereNotNull('last_seen')->orderBy('last_seen', 'DESC')->get();
        return view('all_users', compact('users'));
    }
    public function viewmore(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('view_more', compact('user'));
    }

    public function donate()
    {
        return view('donate');
    }
    public function donateRequest(Request $request)
    {
        $date = Requests::where('userid', '=', auth()->user()->id)->orderBy('id', 'Desc')->first();
        if ($date) {
            $diff = today()->diffInDays($date->updated_at);
            $left = 90 - $diff;
        }

        if (!$date || $diff > 90) {
            $request->validate([
                'userid' => 'integer',
            ]);
            Requests::create([
                'userid' => $request->userid,
            ]);
            return back()->with('success', "Donate Request Submitted Succesfully. We'll Contact you soon");
        } else {
            return back()->with('fail', "You can donate once in every 3 months ( $left days left) !");
        }
    }
    public function rewards_show()
    {
        $rewards = Reward::orderBy('id', 'desc')->paginate(12);
        return view('reward', compact('rewards'));
    }
    public function rewards_search(Request $request)
    {
        $rewards = Reward::search($request->search)->paginate(6);
        if ($rewards->total() == 0) {
            return redirect()->route('rewards_show')->with('error', 'No reward with title "' . $request->search . '"');
        }
        return view('reward', compact('rewards'));
    }

    public function receive()
    {
        return view('receive');
    }
    public function receiveRequest(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^[a-z A-Z]+$/u',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]/|min:9|max:10',
            'group' => 'required|not_in:0',
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'age' => 'required|integer|between:1,101',
            'note' => 'required|string',
        ]);
        if ($request->hasFile('image')) {
            $image = date('YmdHis') . '.' . $request->file('image')->extension();
            Image::make($request->file('image'))->resize(600, 600)->save(public_path('/images/requisitionForm/') . $image, 40);
        }
        BloodRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'group' => $request->group,
            'age' => $request->age,
            'image' => $image,
            'note' => $request->note,
        ]);
        return back()->with('success', "Request Submitted Succesfully. We'll Contact you soon");
    }

    public function team()
    {
        return view('team');
    }
}
