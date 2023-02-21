<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Events extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['title','body','image','date','posted_by'];
    public function toSearchableArray()
    {
        return[
            'title' => $this->title,
        ];
    }
}
