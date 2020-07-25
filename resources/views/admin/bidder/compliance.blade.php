@extends('layouts.app')

@section('body_class','nav-md')
{{-- 
@section('page') --}}

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
         <h3>  Bidder Dashboard | </h3><hr>
             <section class="row new-post">
                     <div class="col-md-6 col-md-offset-3">
                         <h2>Write Compliance Here ..</h2>
                         <form action="{{ route('post.compliance') }}" method="POST">
                         {{ csrf_field() }} 
                         <div class="form-group">
                         <textarea class="form-control" name="body" id="body" rows="6"></textarea>
                         </div>
                         <button type="submit" class="btn btn-primary">Send</button>
                         </form>
                     </div>
                </section>
             @include('errors.message');

             <section class="row posts"><br/>
             <div class="col-md-6 col-md-offset-3">
                
                 <header></header>
                 @foreach ($showCompliances as $showCompliance)
                     
                 <article class="post">
                 <p>{{ $showCompliance->content }}</p>
                     <div class="info">
                     Posted by max on {{ $showCompliance->created_at }}
                     </div>
                     <div class="interaction">
                     <a href="#">Edit</a> |
                     <a href="#">Delete</a>
                     </div>
                 </article>
                 @endforeach
                 </div>    
                 </section>           
           </div>
           </div>
             </div>
              </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     