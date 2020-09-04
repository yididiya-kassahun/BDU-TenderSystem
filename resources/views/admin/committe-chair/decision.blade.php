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

         <form action="{{ route('table.view') }}" method="GET">
                 {{ csrf_field() }}
                <div class="x_panel">
                  <div class="x_title">
                   <h4> Tender Decision | COC</h4><br/>
                    <div class="clearfix"></div>
                  </div>

                    <div class="row">
                        <!-- element 1 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="x_content">
                              <div class="">
                               <div class="title">
                               <h3>አነስተኛ ገንዘብን መሰረት ያደረገ መረጣ</h3>
                               </div>
                                <div class="pricing_features">
                                <img src="{{asset('build/images/money_icon.png')}}" width="140px" height="160px" style="margin-left:60px"/>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                 <input type="checkbox" class="form-control js-switch" name="price"  /> Checked
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- element 1 -->

                        <!-- element 2 -->
                       <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="x_content">
                              <div class="">
                               <div class="title">
                               <h3>ጥራትን መሰረት ያደረገ መረጣ</h3>
                               </div>
                                <div class="pricing_features">
                                    <img src="{{asset('build/images/quality_icon.png')}}" width="140px" height="160px" style="margin-left:60px"/>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                 <input type="checkbox" class="form-control js-switch" name="quality" /> Checked
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- element 2 -->

                        <!-- element 3-->
                         <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="x_content">
                              <div class="">
                               <div class="title"><h3>ዋስትናን መሰረት ያደረገ መረጣ</h3></div>
                                <div class="pricing_features">
                                    <img src="{{asset('build/images/date_icon.png')}}" width="140px" height="160px" style="margin-left:60px"/>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                 <input type="checkbox" class="form-control js-switch" name="guarantee" checked/> Checked
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>

                  </div>
                  <button type="submit" class="btn btn-info" style="margin-left: 400px">Process</button>
                </form>
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Table | ሰንጠረዥ </h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                          @if($pricestate == 1 && $qualitystate == 0)
                          <h3>ዋጋን መሰረት ያደረገ መረጣ</h3>
                          <table class="table jambo_table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>ድርጅት ስም</th>
                                <th>ዝርዝር</th>
                                <th>ነጠላ ዋጋ</th>
                                <th>ጠቅላላ ዋጋ</th>
                                <th>የጨረታ ዋጋ</th>
                                <th>የዋስትና ጊዜ</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($prices as $price)
                                <tr>
                                <th scope="row">1</th>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $price->catalogue }}</td>
                                <td>{{ $price->single_price }} <b>ብር</b></td>
                                <td>{{ $price->total_price }} <b>ብር</b></td>
                                <td>{{ $price->tender_price }} <b>ብር</b></td>
                                <td></td>
                              </tr>
                              @endforeach
                            </tbody>

                          </table>
                          @elseif($pricestate == 1 && $qualitystate == 1)
                          <h3>ዋጋን እና ጥራትን መሰረት ያደረገ መረጣ</h3>
                          <table class="table jambo_table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>ድርጅት ስም</th>
                                <th>ዝርዝር</th>
                                <th>የጨረታ ዋጋ</th>
                                <th>የቴክኒክ ግምገማ</th>
                                <th>የዋስትና ጊዜ</th>
                              </tr>
                            </thead>
                            <tbody>
                             <tr>
                                <td>1</td>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $price->catalogue }}</td>
                                <td>{{ $price->tender_price }} <b>ብር</b></td>
                                <td>{{ $technicalSum }}</td>
                             </tr>
                            </tbody>

                          </table>
                          @endif
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
