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
            @include('admin.manager.include.profile-menu')
            <br />

            <!-- Side nav -->
            @include('admin.manager.include.side-nav');

          </div>
        </div>

        <!-- top navigation -->
      <header>
      @include('admin.manager.include.header')
      </header>

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="x_panel">
               <h3>  Manager Dashboard | </h3><hr>
             <h4> Add Bidder Dashboard | ተጫራች ጨምር</h4><br/>
              <div class="form-group">
               <label><h2>Invite Bidder Via Email  </h2></label><br/>
               <form action="{{ route('manager.mail') }}" method="POST">
                   {{ csrf_field() }}
               <input class="form-control col-md-5" name="to" id="ex1" type="email" placeholder="Email"><br/><br/><br/>
               <button type="submit" class="btn btn-primary"> Send</button><br/>
               </form>
            </div>
            </div>
            <div class="x_panel">
              <h2> List Of Total Registered Bidders</h2>
              <div class="separator"></div>
             <br/>
             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Company</th>
                          <th>Company Phone Number</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($BiddersList as $bidder)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{ $bidder->first_name }}</td>
                          <td>{{ $bidder->last_name}}</td>
                          <td>{{ $bidder->email }}</td>
                          <td>{{ $bidder->company_name}}</td>
                          <td>{{ $bidder->phone_number}}</td>
                          <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {{ $BiddersList->links() }}
                 </div>
           <div class="x_panel" style="margin-top:50px">
            <form>
            <div class="col-md-5">
            <div class="form-group">
                <h5>ጨረታው የሚከፈትበትና የሚያበቃበት ቀን - Date and Time</h5><small>Range</small>
              <div class="input-group date" id="reservation2">
                <input type="text" class="form-control"  value="01/01/2016 - 01/25/2016" />
                <span class="input-group-addon">
                  <span class="fa fa-calendar">
                  </span>
              </span>
              </div>
            </div>
            <div class="form-group">
              <h5>ቅሬታ ማቅረቢያ ቀነ ገደብ</h5>
              <div class="input-group date" id="reservation2">
                <input type="text" class="form-control"  value="01/25/2016" />
                <span class="input-group-addon">
                  <span class="fa fa-calendar">
                  </span>
              </span>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
           </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection
