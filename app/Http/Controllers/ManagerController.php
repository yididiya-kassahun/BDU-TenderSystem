<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TenderPost;
use App\Procurement;

class ManagerController extends Controller
{
     public function createTenderPost(Request $request){

        $this->validate($request,[
          'content' => 'required'
        ]);
        $tenderPost = new TenderPost();
        $tenderPost->content = $request['content'];
       // $request->User()->posts->save($post);
        $message = 'There was an Error occured';
        if($tenderPost->save()){
            $message = 'Post Successfully created';
        }
        return redirect()->route('manager')->with(['message'=>$message]);
     }

    //  public function view1(){
    //      return view('admin.manager.manager');
    //  }

    public function approveTender($tender_id){
         
          $approve = Procurement::where([['approved','=',false],['id','=',$tender_id]])->first();
          $approve->approved = true;
          $message = 'Tender not approved';
          if($approve->update()){
          $message = 'Tender approved';
          }
          return redirect()->route('manager')->with(['message'=>$message]);
    }

     public function showTenderDetail(){

           $showDetail = Procurement::where('approved','=',false)->get();
           return view('admin.manager.manager',['detail'=>$showDetail]);
     }

     public function approvedTender(){

      $showDetail = Procurement::where('approved','=',true)->get();
      return view('admin.manager.approved',['detail'=>$showDetail]);
}

     public function bidder_list(){
      return view('admin.manager.add_bidder');
  }
}
