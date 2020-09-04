<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Validator;
use App\Organisation;
use App\User;

class AdminController extends Controller
{

    public function __construct() {
        //  $this->middleware('guest:bidder');
      }

    public function adminSignUp(Request $request){

        $orgId = DB::table('organisations')->select('org_id')->value('org_id');

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $gender = $request['gender'];
        $email = $request['email'];
        $phone_number = $request['phone_number'];
        $org_id = $orgId;
        $password = bcrypt($request['password']);

        $admin = new User();
        $admin->first_name = $first_name;
        $admin->last_name = $last_name;
        $admin->gender = $gender;
        $admin->email = $email;
        $admin->phone_num = $phone_number;
        $admin->org_id = $org_id;
        $admin->password = $password;

        $admin->save();

        return redirect()->back();
    }


   public function signIn(Request $request){

    $this->validate($request,[
        'email' => 'required',
        'password' => 'required|min:3',
  ]);

  if(Auth::attempt(['email' => $request->email,'password' => $request->password],$request->remember)){


            // ########## Fetch user id from user table
            // ########## Match it in user->role table
            // ########## Then use value and return role table name

          $user_id = DB::table('users')->select('id')->where([
              ['email', '=', $request['email']]
          ])->value('id');

          $role = DB::table('user_role')->select('role_id')->where([
              ['user_id', '=', $user_id]
          ])->value('role_id');

          $role_name = DB::table('roles')->select('name')->where([
              ['id', '=', $role]
          ])->value('name');

          if($role_name == 'Super_admin'){

            return redirect()->route('super');

          }elseif($role_name == 'po'){
            //Auth::login($this);
            return redirect()->route('po');

          }elseif($role_name == 'manager'){
           // Auth::login($this);
            return redirect()->route('manager');

          }elseif($role_name == 'coc'){
           // Auth::login($this);
            return redirect()->route('coc');

          }else{
            return response("UnAuthorized",401);
          }
        }
      return redirect()->back();
      }


    public function signInView(){
        return view('Auth.admin-login');
     }

   public function adminView(){
     return view('auth.register-admin');
     }

   public function logout(){

    Auth::logout();
    return redirect()->route('home');
    
   }
}
