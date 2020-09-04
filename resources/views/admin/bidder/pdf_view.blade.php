<!DOCTYPE html lang="am">
<html>
{{-- lang="{{ app()->getLocale() }}" --}}
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link href='http://fonts.googleapis.com/css?family=YOURFONTFAMILY' rel='stylesheet' type='text/css'> --}}
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
        {{-- <link rel="stylesheet" href="public_path('vendors/bootstrap/dist/css/bootstrap.min.css')"> --}}
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
        {{-- <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="{{asset('src/css/main.css')}}"> --}}

         <style>
            #inputstyle2{
                border-top-style: hidden;
                border-right-style: hidden;
                border-left-style: hidden;
                border-bottom-style: groove;
              }

              #inputstyle{
                border-top-style: hidden;
                border-right-style: hidden;
                border-left-style: hidden;
                border: none;
                background-color: transparent;
                outline: red;

              }
              .no-outline:focus {
                outline: none;
              }
            #inputstyle:focus{
                outline: 0;
            }
            @font-face {
                font-family: 'AbyssinicaSIL-R.ttf';
                font-style: normal;
                font-weight: normal;
                src: url(data:font/truetype;charset=utf-8;base64,BASE64...) format("truetype");
              }
              #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }

              #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
              }

              #customers tr:nth-child(even){background-color: #f2f2f2;}

              #customers tr:hover {background-color: #ddd;}

              #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
              }

            </style>
    </head>

    <body>

        <div style="margin-top:30px">

            @foreach($details as $detail)
            <div style="margin-left:60%">
            <div class="separator"></div>
            <h6>ለ፡</h6>
            <div><h6>የግዢ ፈጻሚ አካል : {{ $detail->purchaser }} </h6></div>
            <div><h6>የጨረታ ሰነድ የወጣበት የግዢ ዘዴ :- {{ $detail->purchase_method }}</h6></div>
            <div><h6>የአገልግሎት ግዢ አይነት {{ $detail->purchase_type }}</h6></div>
            <div><h6>የግዢ መለያ ቁጥር :- {{ $detail->purchase_id_no }}</h6></div>
            <div><h6>የጨረታ ሰነድ የብዙ ምድብ(lot) መለያ ቁጥር {{ $detail->lot_no }}</h6></div><br/>
            </div>
                   @endforeach

            <h5>የዋጋ ማቅረቢያ ሰንጠረዥ</h5>
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

              </table>
              <div class="form-group row">
             <h5>የጨረታ ዋጋ በኢትዮጵያ ብር = {{ $BidderFinance->tender_price }}</h5>
            </div>
             <div style="margin-top:100px">
             <div><h6>ሙሉ ስም : {{$profile->agent_name}}</h6></div>
             <div><h6>ኃላፊነት : የግዢ አገልግሎት</h6></div>
            <div><h6>ስልክ : {{$profile->company_ph}} </h6></div>
            <div><h6>የተፈረመበት ቀን : {{ date('Y-m-d') }}</h6></div>
            <div><h6>ፊርማ:- </h6></div>
            <div style="margin-left:70%"><h6><b>ማህተም </b></h6></div>
             </div>
           </div>

    </body>
     </html>
