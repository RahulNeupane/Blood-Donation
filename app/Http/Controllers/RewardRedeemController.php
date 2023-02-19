<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\RewardRedeem;
use App\Models\User;
use Illuminate\Http\Request;

class RewardRedeemController extends Controller
{
    public function index($id){
        $reward= Reward::findOrFail($id);
        return view('redeem',compact('reward'));
    }
    public function rewardRedeemConfirm($id){
        $reward= Reward::findOrFail($id);
        $user = User::where('id',auth()->user()->id)->first();
        RewardRedeem::create([
            'user_id'=>auth()->user()->id,
            'reward_id'=>$id
        ]);

        $user->RewardPoints = $user->RewardPoints - $reward->point;
        $user->update();
        return back()->with('success',"Redeem Succesful We'll contact soon about delivery detail !");
    }
    public function showReedemedRewards(){
        $redeems = RewardRedeem::with('rReward')->with('rUser')->get();
        return view('reward.redeemed_rewards',compact('redeems'));
    }
}
