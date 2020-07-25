@extends('layouts.app')

@section('body_class','nav-md')
{{-- 
@section('page') --}}

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Tender System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="build/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a> </li>
                  <li><a><i class="fa fa-edit"></i> Posted Bidds</a> </li>
                  <li><a><i class="fa fa-clone"></i>Layouts</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
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
              <form class="form-horizontal form-label-left" method="post" action="{{ route('po_data') }}">
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
             
             
             <br/>  <br/>  <br/>  <br/>  <br/>
            <div class="page-title">
              <div class="title_left">
                <h3>የግዥ ሰነድ መፈጸሚያ </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Typography <small>different design elements</small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-8 col-lg-8 col-sm-7">
                      <!-- blockquote -->
                      <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                          posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                          Someone famous in Source Title.
                      </blockquote>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     