<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Bidder;
use App\TenderPost;
use App\Organisation;

class UserController extends Controller implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function __construct()
    {
      //  $this->middleware('guest:bidder');
    }

    public function bidderSignUp(Request $request){

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $email = $request['email'];
        $company_name = $request['company_name'];
        $phone_number = $request['phone_number'];
        $tender_id = $request['tender_id'];
        $password = bcrypt($request['password']);

        $defaultPhoto ='user.png';
        
        $bidder = new Bidder();
        $bidder->first_name = $first_name;
        $bidder->last_name = $last_name;
        $bidder->email = $email;
        $bidder->company_name = $company_name;
        $bidder->phone_number = $phone_number;
        $bidder->tender_id = $tender_id;
        $bidder->password = $password;
        $bidder->company_logo_url=$defaultPhoto;
        $bidder->save();

        Auth::login($bidder);

        return redirect()->route('bidder');
    }

   public function signIn(Request $request){

    $this->validate($request,[
          'email' => 'required',
          'password' => 'required|min:3',
    ]);

   if(Auth::guard('bidder')->attempt(['email' => $request->email,'password' => $request->password],$request->remember)){
         //   $user = Auth::user('bidder');
        return redirect()->route('bidder');

      }elseif(Auth::attempt(['email' => $request->email,'password' => $request->password],$request->remember)){

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
        return redirect()->route('po');

      }elseif($role_name == 'manager'){
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
       return view('Auth.bidder-login');
   }

   public function bidderView(){
    $tenderTypes = TenderPost::all();
    return view('auth.register-bidder',compact('tenderTypes'));
   }

  public function logout(){

    Auth::guard('bidder')->logout();
    return redirect()->route('home');

   }
}
