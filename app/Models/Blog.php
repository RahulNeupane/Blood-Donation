<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Blog extends Model
{
    use HasFactory, Searchable;
    public function rBlogCategory(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

    public function toSearchableArray()
    {
        return[
            'title' => $this->title,
        ];
    }
}
