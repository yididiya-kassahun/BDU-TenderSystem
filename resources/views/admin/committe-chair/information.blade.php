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
         <h3>  Committe Chair Dashboard | COC </h3><hr>

                <div class="x_panel">
                  <div class="x_title">
                   <h4> የመረጃ ቋት እዝል ማስገቢያ</h4><br/>
                    <div class="clearfix"></div>
                  </div>
                  <section class="row div22" style="margin-left: 120px">
                  <div class="div33 container">

                    <form class="">
                      <fieldset>
                        <div class="col-md-5">
                           
                          <div class="form-group">
                               <h5> የጨረታው ውጤት ማሳወቂያ ቀን - Date and Time</h5>
                              <div class="input-group date" id="reservation2">
                                <input type="text" class="form-control"  value="01/01/2016 - 01/25/2016" />
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar">
                                  </span>
                              </span>
                              </div>
                            </div>
                            <div class="form-group">
                                   <h5> Zoom Meeting Address </h5>
                                  <div class="input-group date" id="reservation2">
                                    <input type="text" class="form-control"/>
                                    <span class="input-group-addon">
                                      <span class="fa fa-video-camera">
                                      </span>
                                  </span>
                                  </div>
                                </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                  </section>

                  <div class="container">

                  </div>

                  </div>
                  <div class="x_panel" style="margin-top:500px">
                  </div>
             </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>

@endsection

