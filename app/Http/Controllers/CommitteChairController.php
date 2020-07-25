<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommitteChairController extends Controller
{
    

    public function committe_chair_page(){
        return view('admin.committe-chair.decision');
    }

    public function bidding_page(){
        return view('admin.committe-chair.bidding');
    }

    public function decision_page(){
        return view('admin.committe-chair.decision');
    }

    public function compliance(){
        return view('admin.committe-chair.compliance');
    }
}
