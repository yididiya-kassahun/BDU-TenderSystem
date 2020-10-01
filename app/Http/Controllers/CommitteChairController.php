<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\compliance;
use App\BidderInfo;
use App\Bidder;
use App\Reply;
use App\file;
use App\BidderFile;
use App\TenderPost;
use App\Information;
use App\AuditorInfo;
use App\TechnicalRank;
use App\Income;
use App\BidderWinner;
use App\BidderFinance;
use App\TechnicalBidResult;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CommitteChairController extends Controller
{
    public function _construct(){
        $this->middleware('auth:user');
    }

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
        $showBidder = Bidder::paginate(10);
        $compliance = compliance::all()->count();
        $posts = TenderPost::all()->count();
        $count = $showBidder->count();

        return view('admin.committe-chair.coc',
        ['showBidders'=>$showBidder,
         'compliancecount'=>$compliance,
         'biddercount'=>$count,
         'post'=>$posts]);
    }

    public function bidding_page($id){
       $bidderProfile = BidderInfo::where(['bidder_id'=>$id])->first();
       $income = Income::where(['bidder_id'=>$id])->first();
       $auditor = AuditorInfo::where(['bidder_id'=>$id])->first();
       $technical = TechnicalRank::all();

       $bidder = Bidder::where(['id'=>$id])->first();
       $tenderPost = TenderPost::where(['tender_id'=>$bidder->tender_id])->first();

       $rank = TechnicalRank::where(['procurement_id'=>$tenderPost->procurement_id])->get();
       // ######### Select Bidder by id
       // ######### fetch procurement id and match it in Technical Rank table

       if($bidderProfile){
        $results = DB::table('bidder_files')
        ->join('files','files.id','=','bidder_files.order')
        ->where('bidder_files.bidder_id', '=', $id)
        ->select('files.name','bidder_files.files', 'bidder_files.url')
        ->get();

        //return $results;

     return view('admin.committe-chair.bidding',
                ['bidderFile'=>$bidderProfile,
                 'showResult'=>$results,
                 'income'=>$income,
                 'auditor'=>$auditor,
                 'showTechs'=>$rank,'bidder'=>$bidder,
                 'technicals'=>$technical]);
       }else{
        return view('errors.error404');
       }

    }

    public function decision_page(){
        $tableprice = 0;
        $tablequality = 0;
        return view('admin.committe-chair.decision',['pricestate'=>$tableprice,'qualitystate'=>$tablequality]);
    }
    public function finance(){
        $showBidder = Bidder::paginate(10);
        return view('admin.committe-chair.finance',['showBidders'=>$showBidder]);

    }
    public function BidderFinance($id){
        $bidderFinance = BidderFinance::where(['bidder_id'=>$id])->first();
        if($bidderFinance){
        return view('admin.committe-chair.bidder-finance',['BidderFinance'=>$bidderFinance]);
        }else{
        return view('errors.error404');
       }
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
        $user = Auth::user();
        $tender_name = 'null';
        if($user){
        $tenderTypes = TenderPost::all();
        $information = Information::all();

       // foreach($tenderTypes as $tenderType){
            foreach($information as $info)
            $tender_name = TenderPost::where('tender_id','=',$info->tender_id)->first();

      //  }
        return view('admin.committe-chair.information',
        ['tenderTypes'=>$tenderTypes,
        'informations'=>$information,
        'tenderName'=>$tender_name]);

    }else{
        return redirect()->back();
     }
    }
    public function infodelete($info_id){
        $message ='Information Not Successfully Deleted';

        $info_delete = Information::find($info_id);
          if($info_delete instanceof Information) {
            if($info_delete->delete()) {
               $message = 'Information deleted Successfully';
            }
          //  return redirect()->back();
            return redirect()->route('information.page')->with(['message'=>$message]);
        }
    }

    public function post_info(Request $request){

        $this->validate($request, [
               'finishing_date' => 'required',
               'zoom_url' => 'required'
        ]);
        $message = 'Oops Error Occure';

        $info = new Information();
        $info->tender_finishing_date = $request['finishing_date'];
        $info->zoom_address = $request['zoom_url'];
        $info->tender_id = $request['tender_id'];
        $request->user()->informations()->save($info);
        if($info->save()){
            $message = 'Information Successfully Posted !!';
        }

        return redirect()->route('information.page')->with(['message'=>$message]);

    }

   public function technicalBidResult(Request $request,$id){

        $bidder = Bidder::where(['id'=>$id])->first();
       // $techcount = TechnicalRank::all();

         $techResult = new TechnicalBidResult();
         $techResult->rank = $request['rank'];
         $techResult->evaluation = $request['evaluation'];
         $techResult->bidder_id = $id;
         $techResult->tender_id = $bidder->tender_id;
         $request->user()->technicalresult()->save($techResult);
         $message = 'result not submitted';
         if($techResult->save()){
             $message='Technical Result Submitted';
         }
         return redirect()->back();
   }

   public function tableView(Request $request){
   $tableprice = 0;
   $tablequality = 0;

    if($request->has('price') == 1 && ($request->has('quality') == 0 && $request->has('guarantee') == 1)){
        $tableprice = 1;
        $tablequality = 0;

        $price_value = DB::table('bidder_finances')->min('tender_price');
        $guarantee_value = DB::table('bidder_finances')->max('guarantee_date');

        $beneficial = array();
        $non_beneficial = array();

        $price = BidderFinance::paginate(10);
        $j = 0;
        foreach($price as $prices){

                $beneficial[$j] =($prices->guarantee_date/$guarantee_value)*0.2; // Is a criteria where higher value is desired
                $non_beneficial[$j] =($price_value/$prices->tender_price)*0.8; // Is a criteria where lower value is desired

                if(BidderWinner::where('bidder_id',$prices->bidder_id)->exists()){
                    $message = "data already exist";
                }else{
                $final_value = new BidderWinner();
                $final_value->bidder_id = $prices->bidder_id;
                $final_value->price_based = $beneficial[$j]+$non_beneficial[$j];
                $final_value->save();

                $j = $j+1;

             }
        }
        // ########## ------ ##########
             return view('admin.committe-chair.decision',
             ['pricestate'=>$tableprice,'qualitystate'=>$tablequality,
              'prices'=>$price]);

    }elseif($request->has('quality') == 1 && ($request->has('price') == 1 && $request->has('guarantee') == 1)){
        $tableprice = 1;
        $tablequality = 1;

        $price_value = DB::table('bidder_finances')->min('tender_price');
        $guarantee_value = DB::table('bidder_finances')->max('guarantee_date');

        $price = BidderFinance::paginate(10);
        $result = array();
        $beneficial = array();
        $non_beneficial = array();
        $beneficial_quality = array();
        $k = 0;
        foreach($price as $pricess){

            $result[$k] = DB::table('technical_bid_results')
            ->selectRaw('rank')
            ->where(['bidder_id'=>$pricess->bidder_id])
            ->sum('rank');

            $bidderId = $pricess->bidder_id;
            $addtech = BidderFinance::find($bidderId);
            $addtech->technical_sum = $result[$k];
            $addtech->update();
            $k++;
        }

        $techSum = DB::table('bidder_finances')->max('technical_sum');
        $i = 0;
        foreach($price as $prices){

            $result[$i] = DB::table('technical_bid_results')
            ->selectRaw('rank')
            ->where(['bidder_id'=>$prices->bidder_id])
            ->sum('rank');

            $beneficial[$i] =($prices->guarantee_date/$guarantee_value)*0.2; // Is a criteria where higher value is desired
            $beneficial_quality[$i]=($result[$i]/$techSum)*0.2;
            $non_beneficial[$i] =($price_value/$prices->tender_price)*0.6; // Is a criteria where lower value is desired

            if(BidderWinner::where('bidder_id',$prices->bidder_id)->exists()){
                $message = "data already exist";
            }else{
            $final_value = new BidderWinner();
            $final_value->bidder_id = $prices->bidder_id;
            $final_value->price_quality_based = $beneficial[$i]+$non_beneficial[$i]+$beneficial_quality[$i];
            $final_value->save();

            $i = $i+1;
            }

        }

        return view('admin.committe-chair.decision',
        ['pricestate'=>$tableprice,'qualitystate'=>$tablequality,
         'price'=>$price]);

    }else{
        return view('admin.committe-chair.decision', ['pricestate'=>$tableprice,'qualitystate'=>$tablequality]);
    }
   }

}
