<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditorInfo extends Model
{
    public function user(){
        return $this->belongsTo('App\Bidder');
    }
}
