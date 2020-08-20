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

        <!-- page content -->
        <div class="right_col" role="main">
         <h3>  Committe Chair Dashboard | </h3><hr>
                   
                <div class="x_panel">
                  <div class="x_title">
                   <h4> Tender Decision | COC</h4><br/>
                    <div class="clearfix"></div>
                  </div>
                 
                    <div class="row">
                        <!-- element 1 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="x_content">
                              <div class="">
                               <div class="title">
                               <h3>አነስተኛ ገንዘብን መሰረት ያደረገ መረጣ</h3>
                               </div>
                                <div class="pricing_features">
                                 <h3>cjbkdjsbckjbcc
                                 dcnlkdnclkdnlksndc
                                 dcknslkdlkdc</h3>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                 <input type="checkbox" class="js-switch" checked /> Checked
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- element 1 -->

                        <!-- element 2 -->
                       <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="x_content">
                              <div class="">
                               <div class="title">
                               <h3>ጥራትን መሰረት ያደረገ መረጣ</h3>
                               </div>
                                <div class="pricing_features">
                                 <h3>cjbkdjsbckjbcc
                                 dcnlkdnclkdnlksndc
                                 dcknslkdlkdc</h3>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                 <input type="checkbox" class="js-switch" checked /> Checked
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- element 2 -->

                        <!-- element 3-->
                         <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="x_content">
                              <div class="">
                               <div class="title"><h3>ዋስትናን መሰረት ያደረገ መረጣ</h3></div>
                                <div class="pricing_features">
                                 <h3>cjbkdjsbckjbcc
                                 dcnlkdnclkdnlksndc
                                 dcknslkdlkdc</h3>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                 <input type="checkbox" class="js-switch" checked /> Checked
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                  </div>
                  <div class="x_panel" style="margin-top:200px">
                  </div>
             </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection     