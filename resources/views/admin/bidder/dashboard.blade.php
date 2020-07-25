@extends('layouts.app')

@section('body_class','nav-md')
{{-- 
@section('page') --}}

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Tender System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.bidder.include.profile-menu');

            <br />

            <!-- sidebar menu -->
            @include('admin.bidder.include.side-nav');

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
         <h3>  Bidder Dashboard | </h3><hr>
             <h2>Upload Tender Documents Below</h2>
             <div class="separator"></div>
                      <br/>
                      
                        <div class="row">
                        <div class="col-xs-12 table">
                        <form method="POST" action="{{ route('file.save') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Number</th>
                                <th>Document</th>
                                <th>File</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>#1</td>
                                <td><i class="fa fa-file"></i> Paper of Buisness License</td>
                                <td><input type="file" name="buisness_image" class="form-control"></td>
                                <td>Not Uploaded</td>
                              </tr>
                              <tr>
                                <td>#2</td>
                                 <td><i class="fa fa-file"></i> Licence Certificate</td>
                                <td><input type="file" name="license_image" class="form-control"></td>
                                <td>Not Uploaded</td>
                              </tr>
                              <tr>
                                <td>#3</td>
                               <td><i class="fa fa-file"></i> Tax Certificate</td>
                               <td><input type="file" name="tax_image" class="form-control"></td>
                                <td>Not Uploaded</td>
                              </tr>
                              <tr>
                                <td>#4</td>
                                <td><i class="fa fa-file"></i> Bid bond guarantee</td>
                                <td><input type="file" name="bid_image" class="form-control"></td>
                                <td>Not Uploaded</td>
                              </tr>
                                <tr>
                                <td>#5</td>
                                <td><i class="fa fa-file"></i> Buisness Registration Certificate</td>
                                <td><input type="file" name="registration_image" class="form-control"></td>
                                <td>Not Uploaded</td>
                              </tr>
                                <tr>
                                <td>#6</td>
                                <td><i class="fa fa-file"></i> Tax Duty Impose</td>
                                <td><input type="file" name="duty_image" class="form-control"></td>
                                <td>Not Uploaded</td>
                              </tr>
                            </tbody>
                          </table>
                          <div style="margin-left:500px">
                          <button type="submit" class="btn btn-primary">Upload</button>
                          </div>
                          </form>
                        </div>
                      </div>  
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     