<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class RewardRedeemController extends Controller
{
    public function index($id){
        $reward= Reward::findOrFail($id);
        return view('redeem',compact('reward'));

    }
}
