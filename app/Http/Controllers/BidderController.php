<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\compliance;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Response;
use App\BidderFile;
use App\BidderInfo;
use App\Bidder;
use App\TenderPost;
use App\AuditorInfo;
use App\Income;
use App\Information;
use App\BidderFinance;
use DateTime;
use PDF;
use Carbon\Carbon;

class BidderController extends Controller
{
    public function _construct(){
        $this->middleware('auth:bidder');
    }

    public function dashboard(Request $request){

        $user = Auth::guard('bidder')->user();
        if($user){
        $user_id =$user->id;
        //return response()->json(['message' => $id], 200);
       // echo($id);
        $profile = BidderInfo::where(['bidder_id'=>$user_id])->first();
        $fileStatus = BidderFile::where(['bidder_id'=>$user_id])->first();
        $defaultStatus = DB::table('defaults')->select('status')->first();
        $default = Bidder::where(['id'=>$user_id])->first();

        if($profile && $fileStatus){
            return view('admin.bidder.dashboard',['profile'=>$profile],['FileStatus'=>$fileStatus]);
        }else{
            return view('admin.bidder.dashboard',['profile'=>$default],['FileStatus'=>$defaultStatus]);
        }
    }else{
        return response()->json(['message'=>'Insuccifient permission'],200);
    }

    }

    public function BidderInfo(Request $request){

              $this->validate($request, [
                    'agent_name' => 'required',
                    'citizenship' => 'required',
                    'company_email' => 'required',
                    'company_ph' => 'required |min:10',
                    'tin_number' => 'required',
                    'tax_id_num' => 'required',
                    'trade_license_reg_num'=> 'required',
                    //'company_logo_url' => 'required|image|mimes:jpeg,png,jpg'
              ]);

              $file = null;
              $file = $request->file('company_logo_url');
                 $filename = $file->getClientOriginalName();
                // echo($filename);
              $destinationPath = public_path('/images/logos');
              $file->move($destinationPath, $filename);
             // $image_url = 'http://127.0.0.1:8000/images/logos/'.$filename;
              $message = 'Oops Error occured';

              $bidderinfo =new BidderInfo();
              $bidderinfo->agent_name = $request['agent_name'];
              $bidderinfo->citizenship = $request['citizenship'];
              $bidderinfo->company_email = $request['company_email'];
              $bidderinfo->company_ph = $request['company_ph'];
              $bidderinfo->tin_number = $request['tin_number'];
              $bidderinfo->tax_id_num = $request['tax_id_num'];
              $bidderinfo->trade_license_reg_num = $request['trade_license_reg_num'];
              $bidderinfo->company_logo_url = $filename;
              $request->user('bidder')->Bidderfiles()->save($bidderinfo);

              if($bidderinfo->save()){
                $message = 'Succesfully posted';
                return redirect()->route('bidder');
              }
    }

    public function compliance(){
        $user = Auth::guard('bidder')->user();
        $user_id =$user->id;
        $default = Bidder::where(['id'=>$user_id])->first();
        $profile = BidderInfo::where(['id'=>$user_id])->first();
        $showCompliance = compliance::where(['bidder_id'=>$user_id])->orderBy('created_at','desc')->get();

        if($profile){
            return view('admin.bidder.compliance',['showCompliances'=>$showCompliance],['profile'=>$profile]);
        }else{
            return view('admin.bidder.compliance',['showCompliances'=>$showCompliance],['profile'=>$default]);
        }
    }

    public function editCompliance(Request $request){

        $this->validate($request, [
                 'body' => 'required'
        ]);

        $editCompliance = compliance::find($request['postId']);
        $editCompliance->content = $request['body'];
        $editCompliance->update();

       return response()->json(['message' => 'Compliance Updated'], 200);
    }

    public function postCompliance(Request $request){

        $this->validate($request,[
             'body' => 'required|string'
        ]);
        $message = 'Oops Error occured';
        $compliance = new compliance();
        $compliance->content = $request['body'];
        $request->user('bidder')->compliances()->save($compliance);
        if($compliance->save()){
            $message = 'Compliance succesfully posted';
        }
        return redirect()->route('compliance.bidder')->with(['message'=>$message]);

    }

    public function fileUpload(Request $request){

        $file = request()->file();
        $status = "Uploaded";

        $i=1;
        foreach ($file as $images) {
            $filename = $images->getClientOriginalName();
          //  $file_extension = strtolower($images->getClientOriginalExtension());
           // $posted_file_name = time().'.'. $file_extension;

            $destinationPath = public_path('/images');
            $images->move($destinationPath, $filename);
            $image_url = 'http://127.0.0.1:8000/images/'.$filename;

            $bidderFile = new BidderFile();
            $bidderFile->files = $filename;
            $bidderFile->url = $image_url;
            $bidderFile->status = $status;
            $bidderFile->order = $i;
            $request->user('bidder')->files()->save($bidderFile);
            $bidderFile->save();
            $i++;

        }
           return redirect()->route('bidder');
              }

          public function info_page(){
            $user = Auth::guard('bidder')->user();

           $item = DB::table('information')->select('tender_finishing_date')->where([
            ['tender_id', '=', $user->tender_id]
        ])->value('tender_finishing_date');

           $date = Carbon::parse($item);
           $information = Information::where(['tender_id'=>$user->tender_id])->first();

            $user_id =$user->id;
            $default = Bidder::where(['id'=>$user_id])->first();
            $profile = BidderInfo::where(['id'=>$user_id])->first();
            if($profile){
                return view('admin.bidder.info',['profile'=>$profile],['date'=>$date,'info'=>$information]);
            }else{
                return view('admin.bidder.info',['profile'=>$default]);
              }
            }

            public function forms(){
                $user = Auth::guard('bidder')->user();
                $user_id =$user->id;
                $default = Bidder::where(['id'=>$user_id])->first();
                $profile = BidderInfo::where(['bidder_id'=>$user_id])->first();

                $detail =TenderPost::all();
                $bidderProfile = BidderInfo::where(['bidder_id'=>$user_id])->first();

                if($profile){
                return view('admin.bidder.forms',['profile'=>$profile],['details'=>$detail],['profile'=>$bidderProfile]);
                }else{
                return view('admin.bidder.forms',['profile'=>$default],['details'=>$detail],['profile'=>$bidderProfile]);
                }
             }

             public function BidderFinance(Request $request){
                $user = Auth::guard('bidder')->user();

                $this->validate($request, [
                        'catalogue'=>'required',
                        'quantity'=>'required',
                        'single_price'=>'required|integer',
                        'total_price'=>'required|integer',
                        'tender_price'=>'required|integer',
                        'guaranteeDate'=>'required|integer'
                ]);

                $finance = new BidderFinance();
                $finance->company_name = $user->company_name;
                $finance->catalogue = $request['catalogue'];
                $finance->quantity = $request['quantity'];
                $finance->single_price = $request['single_price'];
                $finance->total_price = $request['total_price'];
                $finance->tender_price = $request['tender_price'];
                $finance->guarantee_date = $request['guaranteeDate'];
                $request->user('bidder')->finances()->save($finance);

                $message = 'Bidder Financial Form not saved';
                if($finance->save()){
                    $message = 'Form saved successfully';
                }
                return redirect()->route('bidder.form');

             }

            public function storeSignature(Request $request){

                // $base64img =  $request->Input(['image']);
                // $data = base64_decode($base64img); str_replace('data:image/png;base64,', '',

                // $file = public_path() . '/uploads/signature/' .'123123123.png';
                // file_put_contents($file, $data);
                // return \Response::json($data);

            }
            // ******************** FORM *******************************//

            public function income(Request $request){

                $this->validate($request, [
                    'first_year'  => 'required|integer',
                    'second_year' => 'required|integer',
                    'third_year'  => 'required|integer',
              ]);
              $average = $request['first_year']+$request['second_year']+$request['third_year']/3;

              $income = new Income();
              $income->first_year = $request['first_year'];
              $income->second_year = $request['second_year'];
              $income->third_year = $request['third_year'];
              $income->average = $average;
              $request->user('bidder')->incomes()->save($income);
              $income->save();

              return redirect()->back()->with(['average'=>$average]);

            }

            public function auditorInfo(Request $request){
                $this->validate($request,[
                     'full_name'=> 'required|min:4',
                     'address'=>'required',
                     'email'=>'required|email',
                     'ph_number'=>'required'
                ]);

                $auditor = new AuditorInfo();
                $auditor->full_name = $request['full_name'];
                $auditor->address = $request['ph_number'];
                $auditor->email = $request['email'];
                $auditor->ph_number = $request['ph_number'];
                $request->user('bidder')->auditors()->save($auditor);
                $auditor->save();

                return redirect()->back();

            }

            public function createPDF(Request $request) {

                   $user = Auth::guard('bidder')->user();
                   $user_id =$user->id;
                   $default = Bidder::where(['id'=>$user_id])->first();
                   $profile = BidderInfo::where(['bidder_id'=>$user_id])->first();
                   $finance = BidderFinance::where(['bidder_id'=>$user_id])->first();

                   $detail = TenderPost::all();
                   if($request->has('download')) {

                // *** share data to view *** //
                   view()->share('details',$detail);
                   view()->share('profile',$profile);
                   view()->share('BidderFinance',$finance);
                   //$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

                   $pdf = PDF::loadView('/admin/bidder/pdf_view');
                // return view('admin.bidder.pdf_view',['profile'=>$profile]);
                // *** download PDF file with download method ***  //
                return $pdf->download('pdf_file.pdf');
                   }else{
                       return redirect()->back();
                   }
              }
    }




