<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidderFinance extends Model
{
    public function user(){
        return $this->belongsTo('App\Bidder');
    }
}
