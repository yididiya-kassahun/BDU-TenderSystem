<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function user(){
        return $this->belongsTo('App\Bidder');
    }
}
