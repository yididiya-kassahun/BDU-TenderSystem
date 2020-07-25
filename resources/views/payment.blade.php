
@extends('layouts.welcome')

    <div class="container body" style="margin-left:400px;margin-top:80px">
        <div class="main_container">
            @section('header')
       <h1> Bahir Dar University Tender Registration | Payment Page</h1>


        <div class="col-md-6">
         <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                           In Order to Bid Send Your Buisness License Document Via <br/><i class="fa fa-fax"></i> Fax :+11-20-32-43-00 or by 
                           <i class="fa fa-envelope"></i>Postal Address : 033 <br/>
                          </p>
                          <form method="" action="" class="form-horizontal form-label-left">
                           <div class="form-group">
                       <label> Insert Your Card Number :  </label>
                       <input class="form-control" id="ex1" type="number"><br/>
                       <button type="submit" class="btn btn-primary"> Send</button><br/>
                        <i class="fa fa-exclamation-triangle"></i> Make sure to add Your Email Address too. Registration 
                        Link will send through Email Address.

                            </div>
                            </form>
                          <p class="lead">Payment Methods:</p>
                          <img src="build/images/visa.png" alt="Visa">
                          <img src="build/images/mastercard.png" alt="Mastercard">
                          <img src="build/images/american-express.png" alt="American Express">
                          <img src="build/images/paypal.png" alt="Paypal">
                        </div>
        </div>
    </div>