@extends('layouts.app')

@section('body_class','nav-md')

@section('page')

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
        {{--  <div class="x_panel">  --}}
         <h3>  Bidder Dashboard | </h3><hr>

         <div class="col-md-4">
              <div class="x_panel">
                  <h5>አመታዊ የገቢ መረጃ</h5>
              <form action="{{route('income')}}" method="POST">
                   {{ csrf_field() }}
                <table class="table table-bordered jambo_table">
                    <thead>
                      <tr>
                        <th>ዓመት</th>
                        <th>መጠንና የገንዘቡ አይነት</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <div class="form-group">
                        <th scope="row">1</th>
                        <td> <input type="number" class="form-control" name="first_year"/></td>
                        </div>
                      </tr>
                      <tr>
                        <div class="form-group">
                        <th scope="row">2</th>
                        <td> <input type="number" class="form-control" name="second_year"></td>
                        </div>
                    </tr>
                      <tr>
                        <div class="form-group">
                        <th scope="row">3</th>
                        <td> <input type="number" class="form-control" name="third_year"></td>
                        {{--  <td></td>  --}}
                        </div>
                      </tr>
                      <tr>
                        <div class="form-group">
                        <th scope="row">አማካይ አመታዊ ገቢ</th>
                        <td> <input type="number" readonly class="form-control" name="average"></td>
                        {{--  <td></td>  --}}
                        </div>
                      </tr>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <h4>የተጫራች ኦዲት ኤጀንሲ</h4>
                <div class="separator"></div>
             <form action="{{ route('auditor.info') }}" method="POST">
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <h2 class="control-label col-md-3" for="type">የኦዲተር ስም -Name<span class="required"></span>
                    </h2>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="full_name">
                    </div>
                 </div>
                 <div class="form-group row">
                    <h2 class="control-label col-md-3" for="type">አድራሻ - Address<span class="required"></span>
                    </h2>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="address">
                    </div>
                 </div>
                 <div class="form-group row">
                    <h2 class="control-label col-md-3" for="type">ኢሜል -Email<span class="required"></span>
                    </h2>
                    <div class="col-md-8">
                    <input type="email" class="form-control" name="email">
                    </div>
                 </div>
                 <div class="form-group row">
                    <h2 class="control-label col-md-3" for="type">ስልክ - ph number<span class="required"></span>
                    </h2>
                    <div class="col-md-8">
                    <input type="number" class="form-control" name="ph_number">
                    </div>
                 </div><br/>
                 <button type="submit" class="btn btn-primary" style="margin-left:160px">Submit</button>
             </form>
            </div>
        </div>
           {{--  </div>  --}}
           <div class="x_panel" style="margin-top:30px">
            @foreach($details as $detail)
            <div style="margin-left:60%">
            <div class="separator"></div>
            <h6>ለ፡</h6>
            <div><h6>የግዥ ፈጻሚ አካል : {{ $detail->purchaser }} </h6></div>
            <div><h6>የጨረታ ሰነድ የወጣበት የግዢ ዘዴ :- {{ $detail->purchase_method }}</h6></div>
            <div><h6>የአገልግሎት ግዢ አይነት {{ $detail->purchase_type }}</h6></div>
            <div><h6>የግዢ መለያ ቁጥር :- {{ $detail->purchase_id_no }}</h6></div>
            <div><h6>የጨረታ ሰነድ የብዙ ምድብ(lot) መለያ ቁጥር {{ $detail->lot_no }}</h6></div><br/>
            </div>
                   @endforeach

            <h5>የዋጋ ማቅረቢያ ሰንጠረዥ</h5>
            <form action="{{ route('bidder.finance') }}" method="POST">
             {{ csrf_field() }}
            <table class="table table-bordered">
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

                    <th scope="row">1</th>
                    <div class="form-group">
                    <td style="background-color:#e8f0fd"><input type="text" name="catalogue" id="inputstyle" class="form-control no-outline col-md-12" required="required"/></td>
                    </div>
                    <div class="form-group row">
                    <td><input type="checkbox" id="inputstyle" name="location" checked class="form-control col-md-4"/></td>
                    </div>
                    <div class="form-group">
                    <td style="background-color:#e8f0fd"><input type="number" name="quantity" id="inputstyle" class="form-control col-md-5"></td>
                    </div>
                    <div class="form-group row">
                    <td style="background-color:#e8f0fd"><input type="number" name="single_price" id="inputstyle" class="form-control col-md-12"></td>
                    </div>
                    <div class="form-group row">
                    <td style="background-color:#e8f0fd"><input type="number" name="total_price" id="inputstyle" class="form-control col-md-12"></td>
                    </div>
                  </tr>
                </tbody>

              </table>
              <div class="form-group row">
             <h5>የጨረታ ዋጋ በኢትዮጵያ ብር</h5> <input type="number" name="tender_price" id="inputstyle2" class="form-control col-md-4"/>
            </div>
             <div style="margin-top:100px">
            <div><h6>ሙሉ ስም : {{$profile->agent_name}}</h6></div>
            <div><h6>ኃላፊነት : የግዢ አገልግሎት</h6></div>
            <div><h6>ስልክ : {{$profile->company_ph}} </h6></div>
            <div><h6>የተፈረመበት ቀን : {{ date('Y-m-d') }}</h6></div>
            <div><h6>ፊርማ:- </h6></div>
            <div style="margin-left:70%"><h6><b>ማህተም </b></h6></div>
             </div>
             <a class="btn btn-danger"  href="{{ route('generate.pdf',['download'=>'pdf']) }}" style="margin-left:35%">Generate PDF</a>
           <button type="submit" class="btn btn-primary" style="margin-left:5px">POST</button><br/><br/>
           </form>
           </div>
            </div>
             </div>
               </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection
