@extends('layouts.app')

@section('body_class','nav-md')

@section('page')

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <img src="{{asset('build/images/bdu_logo.png')}}" width="30px" height="30px"> <span>Tender System</span></a>
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
              <div class="x_title">
         <h3>  Committe Chair Dashboard </h3></div>
                   <h5> Bidder Information | የተጫራች የመረጃ ቋት</h5><br/>

                      {{-- <h2> {{ $bidderFile->first_name }} </h2> --}}

              </div>

              <div class="row">
               <div class="col-md-6">
               <div class="x_panel">
                      <div class="profile_details">
                        <div class="well profile_view">
                          {{-- <div class="col-sm-12"> --}}
                            <h4 class="brief"><i>Bidder Profile</i></h4>
                             <div class="left col-md-4 text-center">
                              <img src="{{asset('images/logos/'. $bidderFile->company_logo_url) }}" alt="{{ asset('build/images/user.png') }}" class="img-circle img-fluid">
                              company logo
                            </div>
                            <div class="right col-md-6">
                             <h6><b> የወኪል ስም : </b>{{ $bidderFile->agent_name }}</h6>
                             <h6><b>ዜግነት :</b> {{ $bidderFile->citizenship }}</h6>
                             <h6><b>የድርጅቱ ኢሜል :</b> {{ $bidderFile->company_email }}</h6>
                             <h6><b>Tin number :</b> {{ $bidderFile->tin_number }}</h6>
                             <h6><b>የታክስ መለያ ቁጥር : </b>{{ $bidderFile->tax_id_num }}</h6>
                             <h6><b>የንግድ ፍቃድ ምዝገባ ቁጥር :</b> {{ $bidderFile->trade_license_reg_num }}</h6><br/>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> የድርጅቱ ስልክ ቁጥር : {{ $bidderFile->company_ph}}</li>
                                <li><i class="fa fa-phone"></i> የድርጅቱ ኢሜል ፡{{ $bidderFile->company_email }}</li>
                              </ul>
                            </div>
                        </div>
                      </div>
              </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph | የቴክኒክ ግምገማ</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"  style="height: 260px">
                    <canvas id="canvas" height="280" width="600"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel row">
                  <div class="x_content">
				 <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Document Name</th>
                          <th>File</th>
                        </tr>
                      </thead>
                      <tbody>
                @foreach($showResult as $results)
                          <tr>
                          <th scope="row">1</th>
                          <td>{{$results->name}}</td>
                          <td> <a class="btn btn-info" href="{{ route('download',['name'=>$results->files])}}"><i class="fa fa-download"></i> Download File</a></td>
                          <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>
                        </tr>
                @endforeach
                      </tbody>
                    </table>
                </div>
              </div>

                <div class="x_panel row">
                   <div class="x_title">
                     <h2>የተጫራች ኦዲተር ኤጀንሲ መረጃ</h2>
                     <div class="clearfix"></div></div><br/>
                       <h6><i class="fa fa-user"></i>| <b> የኦዲተር ስም - Full Name፡</b> {{ $auditor->full_name }}</h6>
                       <h6><i class="fa fa-map"></i><b>| አድራሻ - Address፡</b> {{ $auditor->address }}</h6>
                       <h6><i class="fa fa-envelope"></i>|<b> ኢሜል - Email ፡</b> {{ $auditor->email }}</h6>
                       <h6><i class="fa fa-phone"></i>|<b> ስልክ ቁጥር - Phone Number፡</b> {{ $auditor->ph_number }}</h6>
                   </div>

             </div>
            {{--  </div>  --}}

             <div class="col-md-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>የጨረታ እዝሎች </h2>
                  <div class="clearfix"></div>
                </div>
                        <div style="margin-left:60px">
                        <div class="col-md-7">
                           <h5>የውክልና ማስረጃ</h5>
                           <p><h6>ጨረታውን ለፈጸመው ሰው የተሰጠ ህጋዊ የውክልና ማስረጃ</h6></p>
                           <button class="form-control btn btn-primary">Download</button>
                           <h5>የቴክኒክ ብቃት ማስረጃ</h5>
                           <p><h6>የቴክኒክ ብቃት ማረጋገጫ ሰነድ<br/>
                            ባለፉት አመታት የተፈጸሙ አጥጋቢ ኮንትራቶች</h6></p>
                           <button class="form-control btn btn-primary">Download</button>
                        </div>
                    {{--  <div class="separator"></div>  --}}
                    </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                  <h2>አመታዊ የገቢ መረጃ </h2>
                  <div class="clearfix"></div>
                  <canvas id="canvasid" height="280" width="600"></canvas>
                </div>
            </div>
            </div>

            <div class="col-md-10">
          <div class="x_panel" style="margin-top:20px;margin-left:130px">
                  <h4>የቴክኒክ ግምገማ ደረጃ ያዝ</h4>
                  <table class="table jambo_table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>የቴክኒክ ግምገማ</th>
                        <th>የግምገማ ነጥብ</th>
                        <th>ውጤት</th>
                        <th>ምዘና</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($showTechs as $technical)
                        <form method="POST" action="{{ route('techical.result',['id'=>$bidder->id]) }}">
                            {{ csrf_field() }}
                        <tr>
                        <th scope="row">1</th>
                        <td><b>{{ $technical->technical_review }}</b></td>
                        <td><b>{{ $technical->point }}</b></td>
                        <td><input type="number" class="form-control col-md-4" name="rank"></td>
                        <td> <select class="from-control" name="evaluation" id="point" required>
                            <option value="እጅግ በጣም ጥሩ">እጅግ በጣም ጥሩ</option>
                            <option value="በጣም ጥሩ">በጣም ጥሩ</option>
                            <option value="ጥሩ">ጥሩ</option>
                            <option value="አጥጋቢ">አጥጋቢ</option>
                            <option value="ደካማ">ደካማ</option></select>
                        </td>
                        <td> <button type="submit" class="btn btn-primary">Add</button></td>
                      </tr>
                      </form>
                      @endforeach
                    </tbody>

                  </table>

             </div>
          </div>
          </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>  --}}
      <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
      <script src="http://www.chartjs.org/samples/latest/utils.js"></script>

      <script>
         // url = "{{url('stock/chart')}}";
         var Years = new Array();
         var Labels = new Array();
         var Prices = new Array();

         /*  var chartdata={
           $.get(null, function(response){
              response.forEach(function(data){
                 Years.push(data.stockYear);

             });  --}}*/
             var ctx = document.getElementById("canvas").getContext('2d');
                 var myChart = new Chart(ctx, {
                   type: 'bar',
                   data: {
                     labels:['sfd','dvssd','dfs','dsf','rqwr','sdf'],
                       datasets: [{
                           label: 'Infosys Price',
                           data: [12,34,53,23,34,54,32],
                           backgroundColor: "rgba(72, 164, 239, 1)",
                           borderWidth: 1
                       }]
                   },
                   options: {
                       scales: {
                           yAxes: [{
                               ticks: {
                                   beginAtZero:true
                               }
                           }]
                       }
                   }
               });
               var firstyr= parseInt(<?php echo $income->first_year; ?>);
               var secondyr = parseInt(<?php echo $income->second_year; ?>);
               var thirdyr = parseInt(<?php echo $income->third_year; ?>);
               var average = parseInt(<?php echo $income->average; ?>);

               var ctx2 = document.getElementById("canvasid").getContext('2d');
               var myChart = new Chart(ctx2, {
                 type: 'pie',
                 data: {
                     labels:['መጀመሪያ አመት','ሁለተና አመት',' ሶስተኛ አመት','አማካይ'],
                     datasets: [{
                         label: 'አመታዊ የገቢ መረጃ',
                         data: [firstyr,secondyr,thirdyr,average],
                         backgroundColor: ["rgba(93, 189, 66, 1)","rgba(186, 69, 151, 1)","rgba(92, 102, 188, 1)","rgba(72, 164, 239, 1)"],
                         borderWidth: 1
                        }]
                 },
                 options: {
                     scales: {
                         yAxes: [{
                             ticks: {
                                 beginAtZero:true
                             }
                         }]
                     }
                 }
             });
         </script>
@endsection
