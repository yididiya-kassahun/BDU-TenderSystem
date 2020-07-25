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
            @include('admin.committe-chair.include.profile-menu');
            <br />

         {{-- side nav --}}
              @include('admin.committe-chair.include.sidenav');

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
         <h3>  Committe Chair Dashboard | </h3><hr>                  
                  {{-- <div class="col-md-12 col-sm-12 col-xs-12"> --}}
               
                  <div class="x_title">
                   <h4> Bidder Information | የተጫራች የመረጃ ቋት</h4><br/>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="margin-left:600px">
                   <div class="col-md-6">
					 	 <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Document Name</th>
                          <th>File</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Paper of Buisness License</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> Download File</button></td>
                          <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>                        
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>License Certificate</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> Download File</button></td>
                           <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Tax Certificate</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> Download File</button></td>
                           <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Bid bond Guarantee</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> Download File</button></td>
                           <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Buisness Registration Certificate</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> Download File</button></td>
                           <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Tax duty imposed doc</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> Download File</button></td>
                           <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>
                        </tr>
                      </tbody>
                    </table>	
						     </div>
                  </div>
                {{-- </div> --}}
              </div>
                
              
             </div>
           <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:600px">
                   
        </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     