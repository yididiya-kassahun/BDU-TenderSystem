<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class SuperAdminController extends Controller
{
    

    public function super_view(){
        $user = User::all();
        return view('admin.super-admin.admin',['users'=>$user]);
    }

    public function permissions(Request $request){
            
        $admin = User::where('email' ,$request['email'])->first();
        
        if($request['role_po']){
           $admin->roles()->attach(Role::where('name','po')->first());
        }
        if($request['role_manager']){
            $admin->roles()->attach(Role::where('name','manager')->first());
         }
         if($request['role_coc']){
            $admin->roles()->attach(Role::where('name','coc')->first());
         }
         return redirect()->back();
    }
}
