<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidderInfo extends Model
{
    public function user(){
        return $this->belongsTo('App\Bidder');
    }
}
