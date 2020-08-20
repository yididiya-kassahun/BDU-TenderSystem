<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;

class MailController extends Controller
{
    

    public function superSendEmail(Request $request){
        // use ($request->email)
        // SendEmail::send(['text'=>'mail'],['name','BDU Tender System'],function($message) use ($request->email){
        //     $message->to($request->email)->subject('Administrator Registration');
        //     $message->from('BDU.Tender@gmail.com','Mahider');
        // });
       // Mail::send(new SendEmail());
       // return response(['email'=>$email]);
    }

    public function email(){
        return view('admin.super-admin.admin');
    }
}
