<!DOCTYPE html>
<html>
{{-- lang="{{ app()->getLocale() }}" --}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">  
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="src/css/main.css">
    <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress --> 
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
         <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
         <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
         <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
         <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
         <link href="build/css/custom.min.css" rel="stylesheet"> 
         {{-- <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
         <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">

         <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
         <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
         <link href="vendors/starrr/dist/starrr.css" rel="stylesheet"> --}}
         
        {{--CSRF Token--}}
         <meta name="csrf-token" content="{{ csrf_token() }}">

    
        {{--Styles--}}
        @yield('styles')

        {{--Head--}}
        @yield('head')

    </head>
    <body class="@yield('body_class')">

        {{--Page--}}
        @yield('page')

   
        {{--Scripts--}}
        @yield('scripts')
        @stack('scripts')
        {{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> --}}
         <script src="/assets/admin/js/dashboard.js"></script>
          {{-- <script> 
        CKEDITOR.replace( 'article-ckeditor' ); 
          </script>  --}} 
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS --> 
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap --> 
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="vendors/iCheck/icheck.min.js"></script>
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    {{-- <script src="build/js/custom.min.js"></script> --}}

      {{-- <script src="vendors/google-code-prettify/src/prettify.js"></script>
      <script src="vendors/select2/dist/js/select2.full.min.js"></script>
      <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
      <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
      <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
     <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
     <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
      <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script> --}}
    </body>
</html>
