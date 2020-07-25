@extends('layouts.app')

@section('body_class','nav-md')

@section('page')

 <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <img src="build/images/bdu_logo.png" width="30px" height="30px"> <span>Tender System</span></a>
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.committe-chair.include.profile-menu');

            <br />

             {{-- side nav --}}
              @include('admin.committe-chair.include.sidenav');

          </div>
        </div>

        <!-- top navigation -->
      <header>
      @include('admin.sections.header')
      </header>
        <!-- page content -->
        <div class="right_col" role="main">
         <div class="x_panel">
         <h3> Compliance Page | COC </h3><hr>
              
                  <div class="x_title">
                   <h4> List Of Compliance | የቅሬታ ማህደር</h4><br/>
                
                    <div class="clearfix"></div>
                  </div>
                 
               <section class="row posts"><br/>
             <div class="col-md-7 col-md-offset-4" style="margin-left:200px">
                
                 <header></header>
                 {{-- @foreach ($showCompliances as $showCompliance) --}}
                     
                 <article class="post">
                 <p>This is test compliance of bidder transformation of the analysis model 
                 into a system design model. System design is the first part to get in to 
                 the solution domainina software development. that takes into account .</p>
                     <div class="info">
                     Posted by max on 2020-04-12 GC.
                     </div>
                     <div class="interaction">
                     <a href="#">Reply</a> 
                     </div>
                 </article>
                  <article class="post">
                 <p>This is test compliance of bidder transformation of the analysis model 
                 into a system design model. System design is the first part to get in to 
                 the solution domainina software development. that takes into account .</p>
                     <div class="info">
                     Posted by max on 2020-04-12 GC.
                     </div>
                     <div class="interaction">
                     <a href="#">Reply</a> 
                     </div>
                 </article>
                 {{-- @endforeach --}}
                 </div>    
                 </section>      	
                  </div>
                  <div class="x_panel" style="margin-top:400px"></div>
                {{-- </div> --}}
              </div>
             </div>
          </div>
            {{-- </div>
              </div> --}}
      <footer>
       @include('admin.sections.footer')
      </footer>
     