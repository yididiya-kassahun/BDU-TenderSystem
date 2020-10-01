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
         <h3>  Committe Chair Dashboard | COC </h3><hr>

                <div class="x_panel">
                  <div class="x_title">
                   <h4> የመረጃ ቋት እዝል ማስገቢያ</h4><br/>
                    <div class="clearfix"></div>
                  </div>
                  <section class="row div22" style="margin-left: 120px">
                  <div class="div33 container">

                    <form method="POST" action="{{ route('info.coc') }}">
                         {{ csrf_field() }}
                      <fieldset>
                        <div class="col-md-5">

                            <div class="form-group row">
                                <label for="ph-num"></label>
                                    <label for="dropdown">Choose Tender Type</label>

                                    <select class="form-control" name="tender_id" id="dropdown" data-parsley-required="true">
                                        @foreach($tenderTypes as $tenderType)
                                 <option value="{{ $tenderType->tender_id }}">{{ $tenderType->purchase_type }}</option>
                                        @endforeach
                                </select>
                               </div>

                          <div class="form-group">
                               <h5> የጨረታው ውጤት ማሳወቂያ ቀን - Date and Time</h5>
                              <div class="input-group date">
                                <input type="text" class="form-control" name="finishing_date"/>
                                <span class="input-group-addon">
                                  <span class="fa fa-calendar">
                                  </span>
                              </span>
                              </div>
                            </div>
                            <div class="form-group">
                                   <h5> Zoom Meeting Address </h5>
                                  <div class="input-group">
                                    <input type="text" name="zoom_url" class="form-control"/>
                                    <span class="input-group-addon">
                                      <span class="fa fa-video-camera">
                                      </span>
                                  </span>
                                  </div>
                                </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                  </section>
                  </div>

                  <div class="x_panel" style="margin-top:50px">

                    @foreach ($informations as $information)
                    <h4> የጨረታ አይነት : <b>{{ $tenderName->purchase_type }}</b></h4>
                    <h4> የጨረታ ውጤት ማሳወቂያ ቀን : <b>{{ $information->tender_finishing_date }}</b></h4>
                    <h4> Zoom አድራሻ : <b>{{ $information->zoom_address }}</b></h4>
                    <hr>
                    <button class="btn btn-primary">Update</button> | <a href="{{ route('info.coc.delete', ['info_id'=>$information->id]) }}"  class="btn btn-danger">delete</a>
                    @endforeach

                  </div>
                  <div class="x_panel" style="margin-top: 200px"></div>
             </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>

@endsection

