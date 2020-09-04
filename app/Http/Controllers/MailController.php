<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Mail\ManagerMail;
use Mail;

class MailController extends Controller
{


    public function superSendEmail(Request $request){
    //     use ($request->email)
    Mail::send(['text'=>'Mail.SuperMail'],['name','BDU Tender System'],function($message) use($request){
            $message->to($request->email)->subject('Administrator Registration');
            $message->from('BDU.Tender@gmail.com','Mahider');
        });
        //Mail::send(new SendEmail());
        return response(['message'=>'Successfully sent']);
    }

    public function email(){
        return view('admin.super-admin.admin');
    }


    public function managerSendEmail(Request $request){

        // Mail::send(['text'=>'Mail.ManagerMail'],['name','BDU Tender System'],function($message) use($request){
        //         $message->to($request->email)->subject('Bidder Registration');
        //         $message->from('BDU.Tender@gmail.com','Mahider');
        //     });
            Mail::send(new ManagerMail());
            //return response(['message'=>'Successfully sent']);
        }

}
