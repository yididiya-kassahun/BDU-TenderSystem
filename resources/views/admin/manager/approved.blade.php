@extends('layouts.app')

@section('body_class','nav-md')

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"> <img src="build/images/bdu_logo.png" width="30px" height="30px"> <span>Tender System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.manager.include.profile-menu');
            <br />

            <!-- sidebar menu -->
            @include('admin.manager.include.side-nav');

          </div>
        </div>

      <header>
      @include('admin.sections.header')
      </header>

        <!-- page content -->
       
        <div class="right_col" role="main">
                    
        <div class="x_panel">
               <h3>  Manager Dashboard | </h3><hr>
             <h4>Approved Tender</h4><br/>  
            @foreach ($detail as $details)
              <br/>
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
             <div class="clearfix"></div>
              </div>
            <div class="separator">            
             <br/><br/></div>
              <br/>
             <br/> 
              @endforeach
            </div>
             @include('errors.message');
               <div class="x_panel">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_title">
                  <h2>Write General Tender Announcement </h2>
                  <ul class="nav navbar-right panel_toolbox">
                  </ul>
                  <div class="clearfix"></div>
                </div>
                  <div id="alerts"></div> 
                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                      </ul>
                    </div>

                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li>
                          <a data-edit="fontSize 5">
                            <p style="font-size:17px">Huge</p>
                          </a>
                        </li>
                        <li>
                          <a data-edit="fontSize 3">
                            <p style="font-size:14px">Normal</p>
                          </a>
                        </li>
                        <li>
                          <a data-edit="fontSize 1">
                            <p style="font-size:11px">Small</p>
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                      <div class="dropdown-menu input-append">
                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                        <button class="btn" type="button">Add</button>
                      </div>
                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                    </div>
                  </div>
                  <form method="POST" action="{{ route('createPost') }}">
                  {{ csrf_field() }} 
                  <div class="form-group">
                  <div id="editor-one" class="editor-wrapper">            
                  <textarea class="form-control" rows="10"  name="content" id="descr"></textarea></div>  
                  <br />
                  <button type="submit" class="btn btn-primary">Post</button>
                  <div class="ln_solid"></div>
                   </div>
                  </form>
            </div>
            
        </div>
          <br />
             <br />
                <br />
          </div>
            </div>
              </div>
      <footer>
       @include('admin.sections.footer')
      </footer>
     