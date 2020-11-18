<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TenderPost;
use App\Procurement;

class HomeController extends Controller
{
     public function home(){
         $post = TenderPost::all();
         return view('home', ['contents'=>$post]);
     }

     public function detail($id){
         $detail =TenderPost::where(['tender_id'=>$id])->get();
         $procurement =TenderPost::where(['tender_id'=>$id])->first();
       //  return response()->json(['message' =>$detail->procurement_id], 200);
         $showDetail = Procurement::where([['approved','=',true],['id','=',$procurement->procurement_id]])->get();
         return view('detail', ['details'=>$detail],['showdetails'=>$showDetail]);
     }


}
