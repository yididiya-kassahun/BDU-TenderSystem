<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\procurement;

class ProcurementController extends Controller
{
    public function po(){
        return view('admin.procurrement-officer.po');
    }

    public function store_po(Request $request){
                
        $request = request()->only('type', 'measurement', 'quantity','single_price','total_price', 'summary');
        $rule = [
            'type' => 'required|string|max:255',
            'measurement' => 'required',
            'quantity' => 'required',
            'single_price' => 'required|string', 
            'total_price' => 'required|string',
            'summary' => 'required|string', 
        ]; 
        $validator = Validator::make($request, $rule);
        if($validator->fails()) {
            return response("validation error", 400);
        }

        $data = new procurement();
        $data->type = $request['type'];
        $data->measurement = $request['measurement'];
        $data->quantity = $request['quantity'];
        $data->single_price = $request['single_price'];
        $data->total_price = $request['total_price'];
        $data->summary = $request['summary'];
        $data->save();

        return view('admin.procurrement-officer.po');
 
    }

    public function posted_bid(){
        $showDetail = Procurement::all();
        return view('admin.procurrement-officer.posted-tender',['detail'=>$showDetail]);
    }
}
