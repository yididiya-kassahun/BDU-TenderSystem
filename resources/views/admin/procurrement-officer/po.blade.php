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
           @include('admin.procurrement-officer.include.profile-menu');
            <br />

            <!-- sidebar menu -->
           @include('admin.procurrement-officer.include.side-nav');
          </div>
        </div>
        <!-- top navigation -->
      <header>
      @include('admin.sections.header')
      </header>
        <!-- page content -->
        <div class="right_col" role="main">
        <div class="x_panel">
               <h3>  procurrement officer Dashboard | </h3><hr>
               <h4> Anouncenemt Detail | PO</h4><br/>

              <br/>
              <form class="form-horizontal form-label-left" method="POST" action="{{ route('po_data') }}">
              {{ csrf_field() }}
                  <div class="form-group row">
                    <h2 class="control-label col-md-3" for="type">Type - የዕቃው አይነት <span class="required"></span>
                    </h2>
                    <div class="col-md-4">
                      <input class="form-control" type="text" id="type" name="type" required="required" class="form-control col-md-7 ">
                    </div>
                  </div>

                   <div class="form-group row">
                    <h2 class="control-label col-md-3" for="measure">Measurement - መለኪያ <span class="required"></span>
                    </h2>
                    <div class="col-md-4">
                      <input class="form-control" type="text" id="measure" name="measurement" required="required" class="form-control col-md-7 ">
                    </div>
                  </div>

                  <div class="form-group row">
                    <h2 class="control-label col-md-3" for="qty">Quantitiy - ብዛት <span class="required"></span>
                    </h2>
                    <div class="col-md-4">
                      <input class="form-control" type="number" id="qty" name="quantity" required="required" class="form-control col-md-7 ">
                    </div>
                  </div>

                   <div class="form-group row">
                    <h2 class="control-label col-md-3" for="s_price">Single Price - ነጠላ ዋጋ <span class="required"></span>
                    </h2>
                    <div class="col-md-4">
                      <input class="form-control" type="number" id="s_price" name="single_price" required="required" class="form-control col-md-7 ">
                    </div>
                  </div>

                   <div class="form-group row">
                    <h2 class="control-label col-md-3" for="t_price">Total Price - ጠቅላላ ዋጋ <span class="required"></span>
                    </h2>
                    <div class="col-md-4">
                      <input class="form-control" type="number" id="t_price" name="total_price" required="required" class="form-control col-md-7 ">
                    </div>
                  </div>

                   <div class="form-group row">
                    <h2 class="control-label col-md-3" for="summary">Summary<span class="required"></span>
                    </h2>
                    <div class="col-md-4">
                      <textarea class="form-control" type="text" rows="5" id="summary" name="summary" required="required"></textarea>
                    </div>
                  </div>
                   <button type="submit" class="btn btn-primary" style="margin-left:400px">Send</button>
                  </form>
                </div>

         <div class="row">
         <div class="col-md-6">
           <div class="x_panel">
            <div class="page-title">
              <div class="title_left">
                <h4>Technical Requirements </h4>
              </div>
            </div>
             <div class="separator"></div>
             <div class="row">
                 <div class="column">
                 <h4>ጨረታ ምረጥ</h4>
                <select class="form-control col-md-12" name="dropdown">
                  @foreach($tenderPosts as $tenderPost)
                  <option value="{{ $tenderPost->tender_id }}">{{ $tenderPost->purchase_id_no }}</option>
                  @endforeach
                </select>
                 </div>
            </div><br/>
           <div class="row"><h4>ለቴክኒክ ግምገማ የተሰጠው ነጥብ ክብደት በመቶኛ : </h4><input type="number" class="form-control col-md-2"><h4>%</h4>
             <button class="btn btn-success" style="margin-left: 15px">Add</button>
            </div><br/><br/>
            <div class="separator"></div>
           
          </div>
           </div>

             <div class="col-md-6">
              <div class="x_panel">
               <h4>Technical Requirement And Rank Table</h4>
               <div class="separator"></div>

             </div>
             </div>

             </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection
