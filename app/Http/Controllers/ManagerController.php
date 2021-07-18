<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TenderPost;
use App\Procurement;
use App\Bidder;
use App\TelegramMember;

class ManagerController extends Controller
{

    public function _construct(){
         $this->middleware('auth:user');
    }

     public function createTenderPost(Request $request){

        $this->validate($request,[
          'content' => 'required'
        ]);
        $tenderPost = new TenderPost();
        $tenderPost->purchaser =$request['purchaser'];
        $tenderPost->purchase_method = $request['purchase_method'];
        $tenderPost->purchase_type = $request['purchase_type'];
        $tenderPost->purchase_id_no = $request['purchase_id_no'];
        $tenderPost->lot_no = $request['lot_no'];
        $tenderPost->content = $request['content'];
        $tenderPost->procurement_id = $request['postIds'];
        $request->user()->posts()->save($tenderPost);
        $message = 'There was an Error occured';
        if($tenderPost->save()){
            $message = 'Post Successfully created';
        }
       return response()->json(['message'=>'Post successfully created'],200);
     }

    public function approveTender($tender_id){

          $approve = Procurement::where([['approved','=',false],['id','=',$tender_id]])->first();
          $approve->approved = true;
          $message = 'Tender not approved';
          if($approve->update()){
          $message = 'Tender approved';
          }
          return redirect()->route('manager')->with(['message'=>$message]);
    }

    public function disapproveTender($tender_id){
        $user = Auth::user();
        $user_id =$user->id;
        if($user){
        $message ='Tender Not Successfully Disapproved';

        $dispprove = Procurement::find($tender_id);
          if($dispprove instanceof Procurement) {
            if($dispprove->delete()) {
               $message = 'Tender Disapproved Successfully';
            }
            return redirect()->route('manager')->with(['message'=>$message]);
        }
    }else{
        return redirect()->back()->with(['message'=>$message]);
    }
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
      $showBidder = Bidder::paginate(10);
      return view('admin.manager.add_bidder',['BiddersList'=>$showBidder]);
  }

    public function payment(){
          return view('admin.manager.payment_list');
    }

    public function telegramView(){
          $members = TelegramMember::paginate(5);

          return view('admin.manager.telegram',['members'=>$members]);
    }

    public function deleteTgMember($id){
        $user = Auth::user();
        $message = 'Member deletion failed!!';
        if($user){

        $memberId = TelegramMember::find($id);
        if($id instanceof $memberId){
            if($memberId->delete()){
                $message = 'Member deleted Successfully';
            }
              return redirect()->route('manager')->with(['message'=>$message]);
        }
        }else{
              return redirect()->back()->with(['message'=>$message]);
        }
    }

}
