<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compliance extends Model
{
    public function bidder(){
        return $this->belongsTo('App\Bidder');
    }
}
