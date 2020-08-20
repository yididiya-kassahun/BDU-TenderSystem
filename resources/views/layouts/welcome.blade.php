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
        <!-- Meta title & meta -->
    {{--@meta--}}

    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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

            </div>
        </div>
    </body>
</html>
