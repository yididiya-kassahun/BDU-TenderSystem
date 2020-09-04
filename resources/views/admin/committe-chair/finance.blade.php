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
         <h3>  Committe Chair Dashboard | </h3><hr>
         <div class="x_panel">
            <h3>ሰነዱ የሚከፈትበት ቀን እና ሰዐት ፡</h3>
         </div>

                  <div class="x_panel" style="margin-top:20px">
                     <h4> የተጫራቾች የፋይናንስ ቅጽ </h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr class="headings">
                              <th>#</th>
                              <th class="column-title">First Name </th>
                              <th class="column-title">Last Name </th>
                              <th class="column-title">Email</th>
                              <th class="column-title">Organaisation </th>
                              <th class="column-title">Phone Number </th>
                              <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($showBidders as $bidder)
                              <tr class="even pointer">
                                <td>{{ $loop->index+1 }}</td>
                                <td class=""><a href="{{ route('BidderFinancial.detail',['bidder_id'=>$bidder->id]) }}">{{ $bidder->first_name }}</a></td>
                                <td class="">{{ $bidder->last_name }}</td>
                                <td class="">{{ $bidder->email}}</td>
                                <td class="">{{ $bidder->company_name}}</td>
                                <td class="">{{ $bidder->phone_number}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        {{ $showBidders->links() }}
                      </div>
                  </div>
                  <div class="x_panel" style="margin-top:400px"></div>
             </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection
