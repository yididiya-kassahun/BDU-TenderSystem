@extends('layouts.app')

@section('body_class','nav-md')

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <img src="build/images/bdu_logo.png" width="30px" height="30px"> <span>Tender System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.manager.include.profile-menu');
            <br />

            <!-- sidebar menu -->
            @include('admin.manager.include.side-nav');

          </div>
        </div>
        <!-- top navigation -->
      <header>
      @include('admin.sections.header')
      </header>
        <!-- /top navigation -->

        <!-- page content -->
       
        <div class="right_col" role="main">
                    
        <div class="x_panel">
               <h3>  Manager Dashboard | </h3><hr>
             <h4>Tender Anouncenemt Detail </h4><br/>  
            @foreach ($detail as $details)
              <br/>
              <h2 style="color:black">Posted Date | {{ $details->created_at }}</h2> <br/><br/>
              <div class="one">
              <div class="col-md-6">
              <h4> Type - የዕቃው አይነት = {{ $details->type }} </h4>
             </div>
               <div class="col-md-6">
               <h4>Measurement - መለኪያ = {{ $details->measurement }}</h4></label>
               </div>
             <div class="col-md-6 ">
             <h4>Quantitiy - ብዛት = {{ $details->quantity }}</h4>
             </div>
             <div class="col-md-6 ">
             <h4>Single Price - ነጠላ ዋጋ = {{ $details->single_price }}</h4>
             </div>
              <div class="col-md-6">
             <h4>Total Price - ጠቅላላ ዋጋ = {{ $details->total_price }}</h4>
             </div>
              <div class="col-md-6">
             <h4><u>Summary</u> </h4><h5>{{ $details->summary }}</h5>
             </div> 
             <div class="clearfix"></div>
              </div>
            <div class="separator">            
             <div class="col-md-6 row">
             <button class="btn btn-primary"><a href=" {{ route('approveTender',['tender_id'=>$details->id]) }}">Approve</a></button>
              <button class="btn btn-danger">Disapprove</button> 
              </div><br/><br/></div>
              <br/>
             <br/> 
              @endforeach
            
             @include('errors.message');
           {{-- </div> --}}
                </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     