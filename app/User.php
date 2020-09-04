<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function roles(){
        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        return false;
    }

    public function hasRole($role){

        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    public function procurments(){
        return $this->hasMany('App\procurement');
    }

    public function posts(){
        return $this->hasMany('App\TenderPost');
    }

    public function technicalrank(){
        return $this->hasMany('App\TechnicalRank');
    }

    public function technicalresult(){
        return $this->hasmany('App\TechnicalBidResult');
    }

    // public function compliances(){
    //     return $this->hasMany('App\compliance');
    // }
}
