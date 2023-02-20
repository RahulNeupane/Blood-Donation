<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\Requests;
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
        return view('reports.redeem');
    }
}
