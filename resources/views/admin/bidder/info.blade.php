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
        <div class="x_panel">
         <h3>Tender Result Date <i class="fa fa-calender"></i> 02-03-2012 E.C Local Time 02:30 A.M</h3><hr>

         <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                <!-- Display the countdown timer in an element -->
                   <h1 style="margin-left:400px; color:#000" id="demo"></h1><hr>
                   <h2 style="margin-left:430px; color:#000">ጨረታው ሊጠናቀቅ የቀረው ቀንና ሰዓት</h2><hr>
                      <h1 style="margin-left:400px"><i class="fa fa-trophy"></i> Tender Winner <i class="fa fa-trophy"></i></h1>
                      
                    </div>
                  </div>
                  <h3><i class="fa fa-video-camera"></i> Zoom Meeting Address </h3>
                  <h3>Meeting ID : </h3> <h4 style="color:#0000ff">{{ $info->zoom_address }} </h4>
                  <h4>URL :</h4>
                </div>
           </div>
           <div class="x_panel" style="margin-top:500px"></div>
           </div>
                </div>

               </div>
               <script>
                // Set the date we're counting down to
                var countDownDate = new Date("{{$date}}").getTime();
              // var countDownDate = {{$profile->created_at}};
                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get today's date and time
                  var now = new Date().getTime();

                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;

                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Display the result in the element with id="demo"
                  document.getElementById("demo").innerHTML = days + "ቀን " + hours + "ሰዓት "
                  + minutes + "ደቂቃ " + seconds + "ሰከንድ ";

                  // If the count down is finished, write some text
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                  }
                }, 1000);
                </script>
<footer>
   @include('admin.sections.footer')
</footer>
@endsection
