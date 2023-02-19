<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function donateReports(){
        return view('reports.donate');
    }
    public function receiveReports(){
        return view('reports.receive');
    }
    public function redeemReports(){
        return view('reports.redeem');
    }
}
