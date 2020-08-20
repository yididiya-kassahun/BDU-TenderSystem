@extends('layouts.app')

@section('body_class','nav-md')

@section('page')

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <img src="{{asset('build/images/bdu_logo.png')}}" width="30px" height="30px"> <span>Tender System</span></a>
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
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="x_panel">
              <div class="x_title">
         <h3>  Committe Chair Dashboard </h3></div>
                   <h5> Bidder Information | የተጫራች የመረጃ ቋት</h5><br/>                    
          
                      {{-- <h2> {{ $bidderFile->first_name }} </h2> --}}
         
              </div>

              <div class="row">
               <div class="col-md-6">
               <div class="x_panel">
                      <div class="profile_details">
                        <div class="well profile_view">
                          {{-- <div class="col-sm-12"> --}}
                            <h4 class="brief"><i>Bidder Profile</i></h4>
                             <div class="left col-md-4 text-center">
                              <img src="{{asset('images/logos/'. $bidderFile->company_logo_url) }}" alt="{{ asset('build/images/user.png') }}" class="img-circle img-fluid">
                              company logo
                            </div>
                            <div class="right col-md-6">
                             <h6><b> የወኪል ስም : </b>{{ $bidderFile->agent_name }}</h6>
                             <h6><b>ዜግነት :</b> {{ $bidderFile->citizenship }}</h6>
                             <h6><b>የድርጅቱ ኢሜል :</b> {{ $bidderFile->company_email }}</h6>
                             <h6><b>Tin number :</b> {{ $bidderFile->tin_number }}</h6>
                             <h6><b>የታክስ መለያ ቁጥር : </b>{{ $bidderFile->tax_id_num }}</h6>
                             <h6><b>የንግድ ፍቃድ ምዝገባ ቁጥር :</b> {{ $bidderFile->trade_license_reg_num }}</h6><br/>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> የድርጅቱ ስልክ ቁጥር : {{ $bidderFile->company_ph}}</li>
                                <li><i class="fa fa-phone"></i> የድርጅቱ ኢሜል ፡{{ $bidderFile->company_email }}</li>
                              </ul>
                            </div>                        
                        </div>
                      </div>
              </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar Graph | የቴክኒክ ግምገማ</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"  style="height: 260px">
                    <canvas id="mybarChart"></canvas>
                  </div>
                </div>
              </div>
             
              <div class="col-md-6">
                <div class="x_panel row"> 
                  <div class="x_content">
					 	       <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Document Name</th>
                          <th>File</th>
                        </tr>
                      </thead>
                      <tbody>
                @foreach($showResult as $results)                
                          <tr>
                          <th scope="row">1</th>
                          <td>{{$results->name}}</td>
                          <td><button class="btn btn-info"><i class="fa fa-download"></i> <a href="{{ route('download',['name'=>$results->files])}}"> Download File</a></button></td>
                          <td><button class="btn btn-success"><i class="fa fa-folder"></i> Open</button></td>                        
                        </tr>
                @endforeach
                      </tbody>
                    </table>	
                </div>
              </div>
             </div>

             <div class="col-md-6">
              <div class="x_panel row">
                <div class="x_title">
                  <h2>የጨረታ እዝሎች </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <canvas id="mybarChart"></canvas>
                </div>
              </div>
            </div>

            </div>
          
            <div class="x_panel" style="margin-top:100px"></div>
          </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection