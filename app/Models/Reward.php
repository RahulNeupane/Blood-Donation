<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Reward extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title','image','point'];
    
    public function toSearchableArray()
    {
        return[
            'title' => $this->title,
        ];
    }
}
