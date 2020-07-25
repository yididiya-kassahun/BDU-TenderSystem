<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\compliance;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\BidderFile;

class BidderController extends Controller
{


    public function dashboard(){
         return view('admin.bidder.dashboard');
    }

    public function compliance(){
        $showCompliance = compliance::all();
        return view('admin.bidder.compliance',['showCompliances'=>$showCompliance]);
    }

    public function postCompliance(Request $request){

        $this->validate($request,[
             'body' => 'required|string'
        ]);
        $message = 'Oops Error occured';
        $compliance = new compliance();
        $compliance->content = $request['body'];
       // $request->user()->compliances()->save($compliance);
        if($compliance->save()){
            $message = 'Compliance succesfully posted';
        }
        return redirect()->route('compliance.bidder')->with(['message'=>$message]);

    }

    public function bidder_registration(){
        return view('auth.register-bidder');
    }

    public function fileUpload(Request $request){
                   // ,'bid_image','registration_image','duty_image'
        $image_file = request()->file('buisness_image','license_image','tax_image');
                
        $image_url = null;
          if (isset($image_file)){
              $file_extension = strtolower($image_file->getClientOriginalExtension());
              if($file_extension == "jpg" || $file_extension == "png") {
                  $posted_file_name1 = 'buisness_image'. $file_extension;
                  $posted_file_name2 = 'license_image'. $file_extension;
                  $posted_file_name3 = 'tax_image'. $file_extension;
                 
                  $destinationPath = public_path('/uploads');
                  $image_file->move($destinationPath, $posted_file_name);
                  $image_url1 = 'http://127.0.0.1:8000/uploads/' . $posted_file_name1;
                  $image_url2 = 'http://127.0.0.1:8000/uploads/' . $posted_file_name2;
                  $image_url3 = 'http://127.0.0.1:8000/uploads/' . $posted_file_name3;
                  
                  $bidderFile_photo= new BidderFile();
                  if($contact_photo){
                         $bidderFile_photo->buisness_image=$image_url1;
                         $bidderFile_photo->license_image=$image_url2;
                         $bidderFile_photo->tax_image=$image_url3;
                         $bidderFile_photo->save();
                  }

                  return redirect()->route('bidder');
              }
                }                           
    }

    // public function getfileImage($filename){
    //     $file = Storage::disk('local')->get($filename);
    //     return new Response($file, 200);
    // }

}
