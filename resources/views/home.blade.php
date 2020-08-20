
@extends('layouts.welcome')
{{--  @section('body_class','nav-md')

@section('page')  --}}

    <div class="container body">
        <div class="main_container">
            @section('header')
            <img src="build/images/banner.jpg" width="100%" height="18%" alt="banner logo">
       {{--  <h1 style="margin-left:400px"> Tender anouncement</h1>  --}}
       <div class="separator"></div>
       <div class="x_panel" style="margin-top:70px">
       <section class="row posts">
       <div class="col-md-12 col-md-3-offset">
       <header><h3>Tender posts | BDU </h3></header>

    @foreach($contents as $post)

       <div class="separator"></div>
       <article style="font-size:20px"><p>{{ Str::words($post->content,$words=50,$end='...') }}</p>
   <div class="more">
        <a href="{{ route('detail',['id'=>$post->tender_id]) }}">... more</a>
        <div class="info">
          Posted Date {{ $post->created_at }} GC
  </div>
   </div>
    </article>
    @endforeach
             </div>
           </section>      
          </div>
        </div>
    </div>
{{--  @endsection  --}}

