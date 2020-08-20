<!DOCTYPE html>
<html>
{{-- lang="{{ app()->getLocale() }}" --}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}">   --}}
        <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('src/css/main.css')}}">
    <!-- Font Awesome -->
        <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="{{asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
         <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
         <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
         <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
         <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
         <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
         {{--  <!-- Ion.RangeSlider -->
         <link href="{{asset('vendors/normalize-css/normalize.css')}}" rel="stylesheet">
         <link href="{{asset('vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
         <link href="{{asset('vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">  --}}

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


        {{-- Scripts
        @yield('scripts')
        @stack('scripts') --}}
    </body>
    {{-- <script src="/assets/admin/js/dashboard.js"></script> --}}
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src=" {{ URL::to('build/app.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{URL::to('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{URL::to('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{URL::to('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Ion.RangeSlider -->
    <script src="{{asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>

    <script  type="text/javascript">
        $(function () {
            $('#reservation2').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        });

     </script>

</html>
