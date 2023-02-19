<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardRedeem extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','reward_id'];
    // public function rReward(){
    //     return $this->belongsTo(Reward::class,'reward_id');
    // }
    // public function rUser(){
    //     return $this->belongsTo(User::class,'user_id');
    // }
}
