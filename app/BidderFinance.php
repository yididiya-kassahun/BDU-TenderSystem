<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BidderFinance extends Model
{
    public function user(){
        return $this->belongsTo('App\Bidder');
    }

    // use Encryptable;

    // protected $encryptable= ['single_price', 'total_price','tender_price','guarantee_date'];

}
