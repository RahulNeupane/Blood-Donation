<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Auth\Events\Registered;

class User extends Authenticable implements MustVerifyEmail
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'district', 'address','phone','age','group','gender','image','role','RewardPoints','RewardPointsUpdated'];

}