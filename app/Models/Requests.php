<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = ['userid', 'type', 'approve'];
    public function users(){
        return $this->hasMany(User::class,'id','userid');
    }
    public function receivers(){
        return $this->hasMany(BloodRequest::class,'id','userid');
    }
}
