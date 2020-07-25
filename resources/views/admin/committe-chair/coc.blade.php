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
        <div class="col-md-12 col-sm-12 col-xs-12">
         <h3>  Committe Chair Dashboard | </h3><hr>
             
                 
                  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   <h4> List Of Available Bidders | COC</h4><br/>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                           
                            <th class="column-title">First Name </th>
                            <th class="column-title">Last Name </th>
                            <th class="column-title">Organaisation </th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Phone Number </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="even pointer">
                            
                            <td class=" ">121000040</td>
                            <td class=" ">May 27, 2014 11:47:56 PM </td>
                            <td class=" ">121000210</td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                          </tr>
                          <tr class="odd pointer">
                           
                            <td class=" ">121000039</td>
                            <td class=" ">May 28, 2014 11:30:12 PM</td>
                            <td class=" ">121000208</td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>

             </div>
           <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:600px">
                 
             
            
        </div>
          <br />
             <br />
                <br />
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     