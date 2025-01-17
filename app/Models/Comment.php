<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function rBlog(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
    public function rReply(){
        return $this->hasMany(Reply::class);
    }
}
