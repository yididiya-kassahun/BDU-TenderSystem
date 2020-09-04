<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\compliance;
use App\BidderInfo;
use App\Bidder;
use App\Reply;
use App\BidderFile;
use App\TenderPost;
use App\AuditorInfo;
use App\TechnicalRank;
use App\Income;
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

      //return $rank;

       if($bidderProfile){
        $results = DB::table('bidder_files')
        ->join('files', 'bidder_files.id', '=', 'files.id')
        ->select('name', 'files', 'url')
        ->get();

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
        return view('admin.committe-chair.information');
    }

   public function technicalBidResult(Request $request,$id){

        $bidder = Bidder::where(['id'=>$id])->first();
       // $techcount = TechnicalRank::all();

      //  for($i = 0; $i < count($techcount); $i++){
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
      //  }
       //  return redirect()->back();
   }

   public function tableView(Request $request){
   $tableprice = 0;
   $tablequality = 0;

    if($request->has('price') == 1 && ($request->has('quality') == 0 && $request->has('guarantee') == 1)){
        $tableprice = 1;
        $tablequality = 0;

        $price = BidderFinance::all();
        foreach($price as $prices){
            $bidder = Bidder::where(['id'=>$prices->bidder_id])->first();
        }
             return view('admin.committe-chair.decision',
             ['pricestate'=>$tableprice,'qualitystate'=>$tablequality,
              'prices'=>$price,'company'=>$bidder]);

    }elseif($request->has('quality') == 1 && ($request->has('price') == 1 && $request->has('guarantee') == 1)){
        $tableprice = 1;
        $tablequality = 1;

        $price = BidderFinance::all();
       // $technicalSum = TechnicalBidResult::all();

        foreach($price as $prices){
            $bidder = Bidder::where(['id'=>$prices->bidder_id])->first();

            $result = DB::table('technical_bid_results')
            ->selectRaw('rank')
            ->where(['bidder_id'=>$prices->bidder_id])
            ->sum('rank');
           // return $result;
        }

        return view('admin.committe-chair.decision',
        ['pricestate'=>$tableprice,'qualitystate'=>$tablequality,
         'price'=>$prices,'company'=>$bidder,'technicalSum'=>$result]);

    }else{
        return view('admin.committe-chair.decision', ['pricestate'=>$tableprice,'qualitystate'=>$tablequality]);
    }
   }

}
