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
                  <div class="x_panel" style="margin-top:20px">
                     <h4> የተጫራቾች የመወዳደሪያ ዋጋ ማቅረቢያ ዝርዝር  </h4>
                     <div class="clearfix"></div>
                     <table id="customers">
                        <thead>
                          <tr>
                            <th>ቁጥር</th>
                            <th>አገልግሎት ዝርዝር</th>
                            <th>ኢትዮጵያ</th>
                            <th>ብዛት</th>
                            <th>ነጠላ ዋጋ በኢትዮጵያ ብር</th>
                            <th>ጠቅላላ ዋጋ በኢትዮጵያ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                            <td>1</td>
                            <div class="form-group">
                            <td style="background-color:#e8f0fd">{{ $BidderFinance->catalogue }}</td>
                            </div>
                            <div class="form-group row">
                            <td><input type="checkbox" id="inputstyle" checked class="form-control col-md-4"/></td>
                            </div>
                            <div class="form-group">
                            <td style="background-color:#e8f0fd">{{ $BidderFinance->quantity }}</td>
                            </div>
                            <div class="form-group row">
                            <td style="background-color:#e8f0fd">{{ $BidderFinance->single_price }}</td>
                            </div>
                            <div class="form-group row">
                            <td style="background-color:#e8f0fd">{{ $BidderFinance->total_price }}</td>
                            </div>

                          </tr>
                        </tbody>
                      </table><br/>
                      <div class="form-group row">
                        <h5>የጨረታ ዋጋ በኢትዮጵያ ብር =  {{ $BidderFinance->tender_price }} ብር </h5>
                       </div>

                  </div>
                  <div class="x_panel" style="margin-top:10px">
                      <h4>የተፈረመበትን ህጋዊ ሰነድ አውርድ |  Download The Signed Document</h4>
                      <div class="separator"></div>
                      <button class="btn btn-primary"><i class="fa fa-download"></i> Download Here</button>
                  </div>
                  <div class="x_panel" style="margin-top: 200px"></div>
             </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection
