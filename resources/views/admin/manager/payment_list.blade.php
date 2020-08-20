@extends('layouts.app')

@section('body_class','nav-md')
@section('page')

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
               <h3>  Registration Payment | </h3><hr>
             <h4>List of paid Bidders</h4><br/> 

              <table class="table table-striped">
        <thead>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Payment Gateway</th>
        <th>Amount(Birr)</th>
        </thead>
        <tbody>
          
            <tr>
              <td>Fikru</td>
              <td>fukru@yahoo.com</td> 
              <td>Paypal</td>
              <td>200</td>
            </tr>
             <tr>
              <td>Fikru</td>
              <td>fukru@yahoo.com</td> 
              <td>Paypal</td>
              <td>200</td>
            </tr>
        </tbody>
    </table> 
            
            
        </div>
         <div class="x_panel" style="margin-top:500px"></div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection