@extends('layouts.app')

@section('body_class','nav-md')

@section('page')

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
                     
                 <article class="post" data-postid =" {{ $showCompliance->id }} ">
                 <p>{{ $showCompliance->content }}</p>
                     <div class="info"> 
                     Posted by {{ $showCompliance->bidder->first_name }} on {{ $showCompliance->created_at }}
                     </div>
                     <div class="interaction">
                     <a href="#" class="edit">Edit</a> |
                     <a href="#">Delete</a>
                     </div>
                 </article>
                 @endforeach
                 </div>    
                 </section> 
                 {{-- data-toggle="modal" data-target=".bs-example-modal-lg" --}}
           </div>
           <div class="x_panel" style="margin-top:200px"></div>
           </div>
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
                          <h5 class="modal-title" id="myModalLabel">Edit Compliance Modal</h5>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form>
                         <div class="form-group">
                          <textarea  class="form-control" id="post-body" cols="6" rows="4"></textarea>
                          </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="modal-save" data-dismiss="modal">Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>
<script>
  var token = '{{ Session::token() }}';
  var url = '{{ route('edit.compliance') }}';
</script>
@endsection
     