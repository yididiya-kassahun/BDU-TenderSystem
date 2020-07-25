<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TenderPost;

class HomeController extends Controller
{
     public function home(){
         $post = TenderPost::all();
         return view('home', ['contents'=>$post]);
     }

     public function payment(){
         return view('payment');
     }
}
