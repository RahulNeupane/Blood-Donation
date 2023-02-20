<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\Requests;
use App\Models\RewardRedeem;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function donateReports(){
        $donate = Requests::where('type', '=', 1)->where('approve', '=', 1)->get();
        return view('reports.donate',compact('donate'));
    }
    public function receiveReports(){
        $receive = BloodRequest::all();
        return view('reports.receive',compact('receive'));
    }
    public function redeemReports(){
        $redeems = RewardRedeem::with('rReward')->with('rUser')->get();
        return view('reports.redeem',compact('redeems'));
    }
}
