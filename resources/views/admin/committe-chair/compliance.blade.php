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

                @foreach( $allCompliances as $compliance)

                  <article class="post" data-postid =" {{ $compliance->id }} ">
                     <p>{{ $compliance->content }}</p>
                     <div class="info">
                     Posted by max on {{ $compliance->created_at }} GC.
                     </div>
                     <div class="interaction">
                     <a href="#" data-toggle="modal" class="reply" data-target=".bs-example-modal-lg">Reply</a>
                     </div>
                 </article>

                 @foreach($replys as $showReply)
                 @if($showReply->id == $compliance->id)
                 <article class="post" style="margin-left:70px">

                    <p>{{ $showReply->Reply }}</p>
                    <div class="info">
                    <p><i> Replied On  {{ $showReply->created_at }}</i></p>
                    </div>
                 </article>
                 @endif
                 @endforeach

                 @endforeach
                 </div>
                 </section>
                  </div>
                  <div class="x_panel" style="margin-top:400px"></div>

              </div>
             </div>
          </div>
      <footer>
       @include('admin.sections.footer')
      </footer>

       {{-- ############### Modal page #####################--}}

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit-modal">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel">Reply For Compliance - Modal</h5>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form>
                        <div class="form-group">
                          <textarea  class="form-control" id="post-body" cols="6" rows="4"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="modal-save">Reply</button>
                          </div>
                         </div>
                        </form>
                      </div>
                    </div>
          </div>
<script>
  var token = '{{ Session::token() }}';
  var url = '{{ route('reply.compliance') }}';
</script>
 @endsection
