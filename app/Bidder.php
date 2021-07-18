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

    public function otherFiles(){
        return $this->hasMany('App\BidderOtherFile');
    }

    public function Bidderfiles(){
        return $this->hasMany('App\BidderInfo');
    }

    public function compliances(){
        return $this->hasMany('App\compliance');
    }

    public function incomes(){
        return $this->hasMany('App\Income');
    }
    public function auditors(){
        return $this->hasMany('App\AuditorInfo');
    }
    public function finances(){
        return $this->hasMany('App\BidderFinance');
    }

        protected $guard = 'bidder';

        protected $fillable = [
            'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
