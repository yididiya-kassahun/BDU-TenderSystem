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
            @include('admin.procurrement-officer.include.profile-menu');
            <br />

            <!-- sidebar menu -->
            @include('admin.procurrement-officer.include.side-nav');

          </div>
        </div>

      <header>
      @include('admin.sections.header')
      </header>

        <!-- page content -->

        <div class="right_col" role="main">

        <div class="x_panel">
               <h3>  Manager Dashboard | </h3><hr>
             <h4>Posted Tender</h4><br/>
            @foreach ($detail as $details)
              <br/>
            <div id="detail" data-postid =" {{ $details->id }} ">
              <h2 style="color:black">Posted Date | {{ $details->created_at }}</h2> <br/><br/>
              <div class="one">
              <div class="col-md-6">
              <h4> Type - የዕቃው አይነት = {{ $details->type }} </h4>
             </div>
               <div class="col-md-6">
               <h4>Measurement - መለኪያ = {{ $details->measurement }}</h4></label>
               </div>
             <div class="col-md-6 ">
             <h4>Quantitiy - ብዛት = {{ $details->quantity }}</h4>
             </div>
             <div class="col-md-6 ">
             <h4>Single Price - ነጠላ ዋጋ = {{ $details->single_price }}</h4>
             </div>
              <div class="col-md-6">
             <h4>Total Price - ጠቅላላ ዋጋ = {{ $details->total_price }}</h4>
             </div>
              <div class="col-md-6">
             <h4><u>Summary</u> </h4><h5>{{ $details->summary }}</h5>
             </div>
              </div>

              <div class="mydiv">
                  <a class="btn btn-primary mod" data-toggle="modal" data-target=".bs-example-modal-lg" style="color:#fff">Add Technical Requirement</a>
              </div>
              <div class="clearfix"></div>

              {{--   start accordion   --}}
             <div class="accordion" id="accordion" role="tablist" >
               <div class="panel">
                 <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <h4 class="panel-title">Technical Requirement And Rank Table</h4>
                 </a>
                 <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                   <div class="panel-body">
                     <table class="table table-bordered jambo_table">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>የግምገማ መስፈርት</th>
                           <th>ነጥብ</th>
                         </tr>
                       </thead>
                       <tbody>
                           @foreach($techreviews as $techreview)
                         <tr>
                           <th scope="row">1</th>
                           <td>{{ $techreview->technical_review }}</td>
                           <td>{{ $techreview->point }}</td>
                         </tr>
                         @endforeach
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
             {{--   end of accordion   --}}
             <div class="separator">
                <br/><br/></div>
            </div>
              @endforeach
            </div>
              <div class="x_panel" style="margin-top:500px"></div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
       {{--   ################## Modal #####################  --}}
       <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel"> የግምገማ መስፈርቶች አካት</h5>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              {{--  Body --}}
         <div class="x_panel">
        <div class="col-md-20 col-sm-20 ">
          <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
            </ul>
            <div class="clearfix"></div>
            {{--  <form action="#" method="POST">  --}}
                <div class="row">

                <div class="column col-md-12">
                 <h4>የግምገማ መስፈርት</h4>
                 <input type="text" class="form-control" id="review">
                </div>
                <div class="column col-md-6" style="margin-left:15px">
                 <h4>ነጥብ</h4>
                 <select class="from-control" id="point" required>
                   <option value="10">10</option>
                   <option value="20">20</option>
                   <option value="30">30</option>
                   <option value="40">40</option>
                   <option value="50">50</option>
                   <option value="60">60</option>
                   <option value="70">70</option>
                   <option value="80">80</option>
                   <option value="90">90</option>
                   <option value="100">100</option>
                 </select>
                    </div><br/><br/>
                </div>
              {{--  </form>  --}}

          </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="modal-save2" class="btn btn-success" data-dismiss="modal">Add</button>
              </div>
      </div>
  </div>
   {{--  ........ End Modal ...........  --}}
   <script>
    var token = '{{ Session::token() }}';
    var url = '{{ route('techReview') }}';
  </script>
@endsection
