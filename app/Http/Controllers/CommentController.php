<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment_submit(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'comment'=>'required|string'
        ]);

        $cmt = new Comment();
        $cmt->blog_id=$request->blog_id;
        $cmt->person_name=$request->name;
        $cmt->person_email=$request->email;
        $cmt->person_comment=$request->comment;
        $cmt->person_type = 'Visitor';
        $cmt->status = 0;
        $cmt->save();

        return back()->with('success','Thank you for comment. Admin will check it soon');

    }
    public function reply_submit(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'comment'=>'required|string'
        ]);

        $cmt = new Reply();
        $cmt->blog_id=$request->blog_id;
        $cmt->comment_id=$request->comment_id;
        $cmt->person_name=$request->name;
        $cmt->person_email=$request->email;
        $cmt->person_comment=$request->comment;
        $cmt->person_type = 'Visitor';
        $cmt->status = 0;
        $cmt->save();

        return back()->with('success','Thank you for reply. Admin will check it soon');

    }
}
