<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\compliance;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\BidderFile;
use App\BidderInfo;
use App\Bidder;
use DateTime;
use Carbon\Carbon;

class BidderController extends Controller
{
    // public function _construct(){
    //    // $this->middleware('auth');
    // }

    public function dashboard(Request $request){

        $user = Auth::guard('bidder')->user();
        if($user){
        $user_id =$user->id;
        //return response()->json(['message' => $id], 200);
       // echo($id);
        $profile = BidderInfo::where(['id'=>$user_id])->first();
        $fileStatus = BidderFile::where(['bidder_id'=>$user_id])->first();
        $defaultStatus = DB::table('defaults')->select('status')->first();
        $default = Bidder::where(['id'=>$user_id])->first();
        if($profile){
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
        $showCompliance = compliance::orderBy('created_at','desc')->get();

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
            $request->user('bidder')->files()->save($bidderFile);
            $bidderFile->save();

        }
           return redirect()->route('bidder');
              }

          public function info_page(){
            $date = Carbon::now();
            $user = Auth::guard('bidder')->user();
            $user_id =$user->id;
            $default = Bidder::where(['id'=>$user_id])->first();
            $profile = BidderInfo::where(['id'=>$user_id])->first();
            if($profile){
                return view('admin.bidder.info',['profile'=>$profile],['date'=>$date]);
            }else{
                return view('admin.bidder.info',['profile'=>$default]);
              }
            }

    }


    // public function getfileImage($filename){
    //     $file = Storage::disk('local')->get($filename);
    //     return new Response($file, 200);
    // }

