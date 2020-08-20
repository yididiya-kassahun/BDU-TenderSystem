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
      @include('admin.bidder.include.header')
      </header>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
         <h3>  Bidder Dashboard | </h3><hr>

           <div class="row">
           <div class="col-md-8">
             <div class="x_panel">
                  <div class="x_title">
                    <h2>ስለ ተጫራች አጠቃላይ መረጃ</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="{{ route('bidder.info') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" name="agent_name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="የህጋዊ ወኪል ስም">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" name="citizenship" class="form-control" id="inputSuccess3" placeholder="ዜግነት">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="email" name="company_email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="የድርጅቱ ኢሜል">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="number" name="company_ph" class="form-control" id="inputSuccess5" placeholder="የድርጅቱ ስልክ">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="number" name="tin_number" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Tin ቁጥር">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="number" name="tax_id_num" class="form-control" id="inputSuccess5" placeholder="የታክስ መለያ ቁጥር">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="number" name="trade_license_reg_num" class="form-control has-feedback-left" id="inputSuccess5" placeholder="የንግድ ፍቃድ ምዝገባ ቁጥር">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label class="col-form-label col-md-4 col-sm-4 ">የድርጅቱ ህጋዊ አርማ</label>
                        <div>
                          <input type="file" name="company_logo_url" class="form-control">
                        </div>
                      </div>

                      <br/>                   
                          <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>
                  @include('errors.message');
                </div>
                </div>
                <div class="col-md-4">
                  <div class="x_panel">
                  <div class="x_content">
                    <div>
                  <h5><small><u>የውክልና ማስረጃ</u></small>
                    <ul>
                    <li>ጨረታውን ለፈጸመው ሰው የተሰጠ ህጋዊ የውክልና ማስረጃ</li>
                    <li>ይህ ሰነድ የዚህን ጨረታ መፈጸም የሚያስችለውን ሰው ሙሉ ሀላፊነት የሰጠ መሆኑን የሚያረጋግጥ መሆን አለበት</li>
                    </ul>
                  </h5>
                     <input type="file" name="wukilna" class="form-control btn btn-primary">
                </div>
               <div>
               <p><h5><small><u>የቴክኒክ ብቃት ማስረጃ</u></small>
               <ul>
              <li>የቴክኒክ ብቃት ማረጋገጫ ሰነድ</li>
              <li>ባለፉት አመታት የተፈጸሙ አጥጋቢ ኮንትራቶች መገለጽ አለበት</li>
               </ul></h5>
              </p>
                   <input type="file" name="wukilna" class="form-control btn btn-primary">
              <div class="separator"></div>
              <button class="btn btn-dark col-md-7" style="margin-left:100px"> Upload Document </button><br/>
              </div>
              </div>

                  </div>
                 </div>
                </div>

        <div class="x_panel">
             <h2>Upload Tender Documents Below</h2>
             <div class="separator"></div>
                      <br/>
                      
                        <div class="row">
                        <div class="col-xs-12 table">
                        <form method="POST" action="{{ route('file.save') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Number</th>
                                <th>Document</th>
                                <th>File</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <div class="form-group">
                                <td>#1</td>
                                <td><i class="fa fa-file"></i> Paper of Buisness License</td>
                                <td><input type="file" name="buisness_image" class="form-control"></td>
                                <td>{{$FileStatus->status}}</td>
                                </div>
                              </tr>
                              <tr>
                                <div class="form-group">
                                <td>#2</td>
                                 <td><i class="fa fa-file"></i> Licence Certificate</td>
                                <td><input type="file" name="license_image" class="form-control"></td>
                                <td>{{$FileStatus->status}}</td>
                                </div>
                              </tr>
                              <tr>
                                <div class="form-group">
                                <td>#3</td>
                               <td><i class="fa fa-file"></i> Tax Certificate</td>
                               <td><input type="file" name="tax_image" class="form-control"></td>
                                <td>{{$FileStatus->status}}</td>
                                </div>
                              </tr>
                              <tr>
                                <div class="form-group">
                                <td>#4</td>
                                <td><i class="fa fa-file"></i> Bid bond guarantee</td>
                                <td><input type="file" name="bid_image" class="form-control"></td>
                                <td>{{$FileStatus->status}}</td>
                                </div>
                              </tr>
                                <tr>
                                  <div class="form-group">
                                <td>#5</td>
                                <td><i class="fa fa-file"></i> Buisness Registration Certificate</td>
                                <td><input type="file" name="registration_image" class="form-control"></td>
                                <td>{{$FileStatus->status}}</td>
                                </div>
                              </tr>
                                <tr>
                                  <div class="form-group">
                                <td>#6</td>
                                <td><i class="fa fa-file"></i> Tax Duty Impose</td>
                                <td><input type="file" name="duty_image" class="form-control"></td>
                                <td>{{$FileStatus->status}}</td>
                                </div>
                              </tr>
                            </tbody>
                          </table>
                          <div style="margin-left:500px">
                          <button type="submit" class="btn btn-primary">Upload</button>
                          </div>
                          </form>
                        </div>
                      </div>  
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
@endsection     