@extends('layouts.welcome')

{{--  @section('body_class','nav-md')

@section('page')  --}}

<div class="container body" style="margin-left:400px;margin-top:80px">
    <div class="main_container">
        @section('header')
        <h1> Bahir Dar University Tender Registration | Payment Page</h1>


        <div class="col-md-16">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                In Order to Bid Send Your Buisness License Document Via <br /><i class="fa fa-fax"></i> Fax
                :+11-20-32-43-00 or by
                <i class="fa fa-envelope"></i>Postal Address : 033 <br />
            </p>

              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      <h4><span id="card_type"></span> Make a payment</h4>
                    </div>
                    <div class="panel-body">
                        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''}}">{{ Session::get('error') }}</div>
                        <form action="{{ route('charge') }}" method="POST" id="payment-form" class="form-horizontal
                        form-label-left" id="checkout-form">

                        <div class="payment-errors"></div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Cardholder Name</label>
                              <input class="form-control input-lg" id="cardholder-name" type="text" data-stripe="name" placeholder="Jimmy Dean">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Card Number</label>
                                <input class="form-control input-lg" id="card-number" type="tel" size="20" data-stripe="number" placeholder="4242 4242 4242 4242">
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Cardholder Email</label>
                                <input class="form-control input-lg" id="email" type="email" data-stripe="email" placeholder="Jimmy@gmail.com">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>CVC</label>
                              <input class="form-control input-lg" id="card-cvc" type="tel" size="4" data-stripe="cvc" placeholder="555" autocomplete="off">
                            </div>
                          </div>
                          </div>

                        <div class="row">
                          <div class="col-md-7">
                            <div class="form-group">
                              <label>Expiry month</label>
                              <input class="form-control input-lg" id="card-expiry-month" type="tel" size="2"  placeholder="MM">
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label>Expiry Year</label>
                              <input class="form-control input-lg" id="card-expiry-year"  size="4" placeholder="YYY" autocomplete="off">
                            </div>
                          </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-lg btn-block btn-success submit" type="submit">Submit payment</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                <i class="fa fa-exclamation-triangle"></i> Make sure to add Your Email Address too. Registration
                Link will send through Email Address.

             <p class="lead">Payment Methods:</p>
             <img src="build/images/visa.png" alt="Visa">
             <img src="build/images/mastercard.png" alt="Mastercard">
             <img src="build/images/american-express.png" alt="American Express">
             <img src="build/images/paypal.png" alt="Paypal">
                </div>
        </div>

    </div>
</div>
</div>


{{--  @section('scripts')
       <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
       <script type="text/javascript" src="{{URL::to('build/stripe.js')}}"></script>
@endsection  --}}



