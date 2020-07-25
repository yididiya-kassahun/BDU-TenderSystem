
@extends('layouts.welcome')

    <div class="container body">
        <div class="main_container">
            @section('header')
       <h1 style="margin-left:400px"> Tender anouncement</h1>
       <div class="separator"></div>
       <div class="x_panel" style="margin-top:70px">
       <section class="row posts">
       <div class="col-md-12 col-md-3-offset">
       <header><h3>Tender posts | BDU </h3></header>

    @foreach($contents as $post)

       <div class="separator"></div>
       <article style="font-size:20px"><p>{{ $post->content }}</p>
   <div class="more">
        <a href="#">... more</a>
        <div class="info">
          Posted Date {{ $post->created_at }} GC
  </div>
   </div>
    <div class="interaction">
        <button class="btn btn-dark" onClick=""><a href="{{ route('payment') }}">Interested</a></button>
       </div></article>
    @endforeach
             </div>
           </section>      
          </div>
        </div>
    </div>


