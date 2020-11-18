<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{--  <link rel="stylesheet" href="{{asset('css/app.css')}}">  --}}
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('build/css/payment.css') }}" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #F7F7F7;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

        </style>

        <!-- Laravel variables for js -->
        {{--@tojs--}}
    </head>
    <body class="@yield('body_class')">

            {{--Page--}}

        <div class="flex-center position-ref full-height">

            <div class="content">
                @yield('page')
                @yield('content')
                @yield('scripts')

            </div>
         </div>
    </body>
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
    </script>
    <script src="{{ asset('build/card.js') }}"></script>
</html>
