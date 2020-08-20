<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Bidder extends Model implements Authenticatable
{

    use \Illuminate\Auth\Authenticatable;
    
    public function files(){
        return $this->hasMany('App\BidderFile');
    }

    public function Bidderfiles(){
        return $this->hasMany('App\BidderInfo');
    }

    public function compliances(){
        return $this->hasMany('App\compliance');
    }

        protected $guard = 'bidder';

        protected $fillable = [
            'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
