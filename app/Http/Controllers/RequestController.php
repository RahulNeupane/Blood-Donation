<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function donateRequests(){
        $requests = Requests::where('type', '=', 1)->where('approve','=',0)->get();
        return view('request.donate',compact('requests'));
    }
    public function donateRequestAccept(Request $request, $id){
        $user = Requests::where('userid', '=', $id)->first();
        $user->update([
            'approve'=>1
        ]);
        return back();
    }
}
