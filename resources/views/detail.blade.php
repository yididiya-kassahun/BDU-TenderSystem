
@extends('layouts.welcome')

<div class="container body">
    <div class="main_container">
        @section('header')
   <h1 style="margin-left:400px"> Tender anouncement</h1>
   <div class="separator"></div>
   <div class="x_panel" style="margin-top:70px">
   <section class="row posts">
   <div class="col-md-12 col-md-3-offset">
   <header><h3>ጨረታ</h3></header>

@foreach($details as $detail)

   <div class="separator"></div>
   <div>የግዥ ፈጻሚ አካል :- {{ $detail->purchaser }} </div>
   <div>የጨረታ ሰነድ የወጣበት የግዢ ዘዴ :- {{ $detail->purchase_method }}</div>
   <div>የአገልግሎት ግዢ አይነት :- {{ $detail->purchase_type }}</div>
   <div>የግዢ መለያ ቁጥር :- {{ $detail->purchase_id_no }}</div>
   <div>የጨረታ ሰነድ የብዙ ምድብ(lot) መለያ ቁጥር {{ $detail->lot_no }}</div><br/>

          @foreach($showdetails as $showdetail)
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ተ.ቁ</th>
                <th>የዕቃው አይነት</th>
                <th>መለኪያ</th>
                <th>ብዛት</th>
                <th>የጨረታ ማስከበሪያ ነጠላ ዋጋ</th>
                <th>የጨረታ ማስከበሪያ ጠቅላላ ዋጋ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>{{ $showdetail->type }}</td>
                <td>{{ $showdetail->measurement}}</td>
                <td>{{ $showdetail->quantity}}</td>
                <td>{{ $showdetail->single_price}}</td>
                <td>{{ $showdetail->total_price}}</td>
              </tr>
            </tbody>
          </table>

          @endforeach
<br/>
   <article style="font-size:20px"><p>{{ $detail->content }}</p>
  <div class="more">
    <div class="info">
      Posted Date {{ $detail->created_at }} GC
</div>
</div>
<div class="interaction">
    <button class="btn btn-dark" onClick=""><a href="{{ route('payment') }}">Interested</a></button>
   </div>
</article>
@endforeach
         </div>
       </section>      
      </div>
    </div>
</div>


