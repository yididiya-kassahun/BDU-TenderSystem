<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    // public function posts(){
    //     return $this->hasMany('App\TenderPost');
    // }

    // public function compliances(){
    //     return $this->hasMany('App\compliance');
    // }
}
