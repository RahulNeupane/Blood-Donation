<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'district', 'address','phone','age','group','gender','image'];

}