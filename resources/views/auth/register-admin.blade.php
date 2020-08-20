@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
        <div class="col-md-4" style="margin-left:500px;margin-top:70px">
        <div class="right_col" role="main">
        <div class="x_panel">
        <h3>    Registration Form </h3>
        <div class="separator"></div>
         <div class="clearfix"></div>
                <br />
         <form action="{{ route('admin.register') }}" method="POST" class="form-horizontal form-label-left">
           
            <div class="form-group row">
             <label for="first-name">First Name</label>
             <input class="form-control" type="text" name="first_name" id="first-name">
            </div>

            <div class="form-group row">
             <label  for="last_name">Last Name</label>
             <input class="form-control" type="text" name="last_name" id="last_name">
            </div>

            <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                            <div class="col-md-6 col-sm-6 ">
                              <div id="gender" class=" btn-group" data-toggle="buttons">
                                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                  <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                  <input type="radio" name="gender" value="female" class="join-btn"> Female
                                </label>
                              </div>
                            </div>
                          </div>
           
            <div class="form-group row">
             <label for="email">Email</label>
             <input class="form-control" type="email" name="email" id="email">
            </div>
            
            <div class="form-group row">
             <label for="ph-num">Phone Number</label>
             <input class="form-control" type="number" name="phone_number" id="ph-num">
            </div>
              <div class="form-group row">
             <label for="pass">Password</label>
             <input class="form-control" type="password" name="password" id="pass">
            </div>
              <div class="form-group row">
             <label for="conf-pass">Confrim Password</label>
             <input class="form-control" type="password" name="conf-pass" id="conf-pass">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
             <input type="hidden" name="_token" value="{{ Session::token() }}">
         </div>
         </div>
         </div>
         </div>
        </section>    
@endsection
