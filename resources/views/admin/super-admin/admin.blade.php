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
                  <li><a><i class="fa fa-edit"></i> Forms</a> </li>
                  
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
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
               <h3>  Super Administrator Dashboard | </h3><hr>
             <h4> </h4><br/>              
              <br/>            
              <br/>
            <div class="form-group">
               <h2>ለአዲስ ተቆጣጣሪ ኢሜል ላክ  </h2><br/>
               <form action="{{ route('sendEmail.super') }}" method="POST">
               {{ csrf_field() }}
               <input class="form-control col-md-6 " name="email" id="email" type="email"><br/><br/><br/>
               <button type="submit" class="btn btn-primary"> Send</button><br/>
               </form>
            </div><br/><br/><br/><br/>
  <table class="table table-hover">
        <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail</th>
        <th>Procurement Officer</th>
        <th>Manager</th>
        <th>Commite Chair </th>
         <th>Super Admin </th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
          
            <tr>
                <form action="{{ route('admin.assign') }}" method="POST">
                {{ csrf_field() }}
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td> 
                    <td>{{$user->email}}<input type="hidden" name="email" value="{{$user->email}}"></td>
                    <td><input type="checkbox" {{$user->hasRole('po') ? 'checked' : ''}} name="role_po"></td>
                    <td><input type="checkbox" {{$user->hasRole('manager') ? 'checked' : ''}} name="role_manager"></td>
                    <td><input type="checkbox" {{$user->hasRole('coc') ? 'checked' : ''}} name="role_coc"></td>
                    <td><input type="checkbox" {{$user->hasRole('Super_admin') ? 'checked' : ''}} name="role_super"></td>
                    <td><button type="submit" class="btn btn-primary">Assign Roles</button></td>
                    <td><button type="submit" class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:600px">
                          
            
        </div>
              </div>
            </div>
            
      <footer>
       @include('admin.sections.footer')
      </footer>
 @endsection    