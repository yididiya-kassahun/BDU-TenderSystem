@extends('layouts.app')

@section('body_class','nav-md')
{{-- 
@section('page') --}}

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <img src="build/images/bdu_logo.png" width="30px" height="30px"> <span>Tender System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.manager.include.profile-menu')
            <br />

            <!-- Side nav -->
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
        {{-- <div class="col-md-12 col-sm-12 col-xs-12"> --}}
        <div class="x_panel">
               <h3>  Manager Dashboard | </h3><hr>
             <h4> Add Bidder Dashboard | ተጫራች ጨምር</h4><br/>   
              <div class="form-group">
               <label><h2>Invite Bidder Via Email  </h2></label><br/>
               <input class="form-control col-md-5 " id="ex1" type="email" placeholder="Email"><br/><br/><br/>
               <button type="submit" class="btn btn-primary"> Send</button><br/>
            </div>
            </div>
            <div class="x_panel">
              <h2> List Of Total Registered Bidders</h2>
              <div class="separator"></div>
             <br/>
             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Company</th>
                          <th>city</th>
                          <th>Company Phone Number</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>mark@gmail.com</td>
                          <td>Unisa Ltd.</td>
                          <td>Addis Ababa</td>
                          <td>+25198030232</td>
                          <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Abebe</td>
                          <td>Otto</td>
                          <td>abebe002@gmail.com</td>
                          <td>Afri Ltd.</td>
                          <td>Addis Ababa</td>
                          <td>+25193050232</td>
                          <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <tr>
                           <th scope="row">3</th>
                          <td>Kebede</td>
                          <td>desta</td>
                          <td>dest33@gmail.com</td>
                          <td>Afri Ltd.</td>
                          <td>Addis Ababa</td>
                          <td>+25193050232</td>
                          <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      </tbody>
                    </table>         
                 </div>
         
          </div>
           {{-- <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:600px">            
            
        </div> --}}
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     