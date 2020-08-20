@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
        <div class="col-md-4" style="margin-left:500px;margin-top:70px">
        <div class="right_col" role="main">
        <div class="x_panel">
        <h3> Bidder Registration Form </h3>
        <div class="separator"></div>
         <div class="clearfix"></div>
                <br />
         <form action="{{ route('bidder.register') }}" method="POST" class="form-horizontal form-label-left">
          
            <div class="form-group row">
             <label for="first-name">First Name</label>
             <input class="form-control" type="text" name="first_name" id="first-name">
            </div>

            <div class="form-group row">
             <label  for="first-name">Last Name</label>
             <input class="form-control" type="text" name="last_name" id="first-name">
            </div>

            <div class="form-group row">
             <label for="email">Email</label>
             <input class="form-control" type="email" name="email" id="email">
            </div>

            <div class="form-group row">
             <label  for="company-name">Company Name</label>
             <input class="form-control" type="text" name="company_name" id="company-name">
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
             <input type="password" class="form-control" name="conf-pass" id="conf-pass">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         <input type="hidden" name="_token" value="{{ Session::token() }}">
         </div>
         </div>
         </div>
         </div>
        </section>    
@endsection
