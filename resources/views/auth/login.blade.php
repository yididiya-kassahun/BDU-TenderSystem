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
            <form>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-primary">Log in</button><br/>
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
