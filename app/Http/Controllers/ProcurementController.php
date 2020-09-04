<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\procurement;
use App\TenderPost;
use App\TechnicalRank;

class ProcurementController extends Controller
{
    public function _construct(){
        $this->middleware('auth:user');
    }
    
    public function po(){
        $tenderPosts = TenderPost::all();
        return view('admin.procurrement-officer.po',compact('tenderPosts'));
    }

    public function store_po(Request $request){

        //$request = request('type', 'measurement', 'quantity','single_price','total_price', 'summary');
        $this->validate($request, [
            'type' => 'required|string|max:255',
            'measurement' => 'required',
            'quantity' => 'required',
            'single_price' => 'required|string',
            'total_price' => 'required|string',
            'summary' => 'required|string',
        ]);

        $data = new procurement();
        $data->type = $request['type'];
        $data->measurement = $request['measurement'];
        $data->quantity = $request['quantity'];
        $data->single_price = $request['single_price'];
        $data->total_price = $request['total_price'];
        $data->summary = $request['summary'];
        $request->user()->procurments()->save($data);
        $message = 'Oops Error Occured';
        if($data->save()){
            $message = 'Post Successfully created';
        }
        //return response()->json(['message'=>'Post successfully created'],200);

        return redirect()->back();

    }

    public function TechnicalPoint(Request $request){
        $this->validate($request, [
                 'technical_review' => 'required',
                 'point' => 'required|integer'
        ]);

        $reviews = new TechnicalRank();
        $reviews->technical_review = $request['technical_review'];
        $reviews->point = $request['point'];
        $reviews->procurement_id = $request['postIds'];
        $request->user()->technicalrank()->save($reviews);
        $message = 'There was an Error occured';
        if($reviews->save()){
            $message = 'Technical review Successfully created';
        }
       return response()->json(['message'=>'Post successfully created'],200);
    }

    public function posted_bid(){
        $user = Auth::user();
        $user_id =$user->id;

        $showDetail = Procurement::where([['approved','=',true],['user_id','=',$user_id]])->get();
       // $id = $showDetail->id;
        $techreview = TechnicalRank::all();
        return view('admin.procurrement-officer.posted-tender',['detail'=>$showDetail,'techreviews'=>$techreview]);
    }
}
