@extends('layouts.welcome')

<div class="container body">
    <div class="main_container">
      @section('header')
    <div style="margin-left:30%;margin-top:20%">
       <h2 style="margin-left:100px">:( Oops!!</h2><hr>
       <!-- Display the countdown timer in an element -->
       <h1 id="demo"></h1><hr>
       <h3>የጨረታው ቀን አልተጠናቀቀም !!</h3>
    </div>
    </div>
</div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{$date}}").getTime();

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
      + minutes + "ደቂቃ " + seconds + "ሰከንድ " + "ይቀረዋል::";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>



