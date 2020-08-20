<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\compliance;
use App\BidderInfo;
use App\Bidder;
use App\Reply;
use App\BidderFile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CommitteChairController extends Controller
{

    public function compliance(){

        $showCompliance = compliance::orderBy('created_at','desc')->get();
        $showReply=Reply::all();
        return view('admin.committe-chair.compliance',['allCompliances'=>$showCompliance],['replys'=>$showReply]);
    }

    public function replyCompliance(Request $request){

        $this->validate($request, [
                 'body' => 'required'
        ]);

        $compliance_id =DB::table('compliances')->where('id','=',$request['postId'])->value('id');

       // echo($compliance_id);
        $replyCompliance =new Reply();
        $replyCompliance->Reply =$request['body'];
        $replyCompliance->compliance_id = $compliance_id;
        $replyCompliance->save();

       return response()->json(['message' => 'Compliance Replied'], 200);
    }

    public function committe_chair_page(){
        $showBidder = Bidder::all();
        return view('admin.committe-chair.coc',['showBidders'=>$showBidder]);
    }

    public function bidding_page($id){
       // $bidderProfile = Bidder::where(['id'=>$id])->first();
       // echo($bidderProfile->first_name);
       $bidderProfile = BidderInfo::where(['id'=>$id])->first();

       if($bidderProfile){
        $results = DB::table('bidder_files')
        ->join('files', 'bidder_files.id', '=', 'files.id')
        ->select('name', 'files', 'url')
        ->get();
        // echo($bidderProfile);
   return view('admin.committe-chair.bidding',['bidderFile'=>$bidderProfile],['showResult'=>$results]);
       }else{
        return view('errors.error404');
       }

    }

    public function decision_page(){
        return view('admin.committe-chair.decision');
    }

    public function download($filename){
             $headers = array(
                'Content-Disposition' => 'inline',
            );

            $file_path = public_path()."/images/".$filename;
            if (file_exists($file_path))
            {
                return response()->download($file_path, $filename, $headers);
            }
            else
            {
                // Error
                exit('Requested file does not exist on our server!');
            }
    }
    public function informations(){
        return view('admin.committe-chair.information');
    }

}
