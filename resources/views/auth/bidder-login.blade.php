@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    <div>
      <h3 style="margin-left:600px;margin-top:100px">Tender Decision Support System</h3>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                   
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('bidder.signIn')}}">
              <h1>Login Form</h1>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Log in</button><br/>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <a class="reset_pass">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>BDU Tender DS System</h1>
                  <p>©2020 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
              </section>
            </div>
        </div>
    </div>
@endsection
