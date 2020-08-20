<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::group(['middleware' => ['web']], function(){

      Route::post('/bidder_register',[
            'uses'=>'AdminController@adminSignUp',
            'as' =>'admin.register'
      ]);
      Route::post('/admin_register',[
            'uses'=>'UserController@bidderSignUp',
            'as' =>'bidder.register'
      ]);
      Route::get('/bidder_registration',[
            'uses'=>'UserController@bidder_registerview',
      ]);

      Route::get('/register', [
             'uses' => 'UserController@bidderView',
      ]);
      Route::get('/register.admin', [
            'uses' => 'AdminController@adminView'
     ]);

      Route::post('/bidder.signIn', [
            'uses' => 'UserController@signIn',
            'as' => 'bidder.signIn'
      ]);
      Route::get('/bidder.login',[
            'uses' => 'UserController@signInView'
      ]);

      Route::post('/admin.login', [
            'uses' => 'AdminController@signIn',
            'as' => 'admin.signIn'
      ]);

      Route::get('/admin.login',[
            'uses' => 'AdminController@signInView'
      ]);

      Route::get('/check', function () {
            return view('admin.committe-chair.complaint');
        });

      // ################# Bidder Route ##################

      Route::get('/bidder',[
            'uses'=>'BidderController@dashboard',
            'as'=>'bidder'
      ]);

      Route::post('/bidder.info', [
            'uses' => 'BidderController@BidderInfo',
            'as' => 'bidder.info'
      ]);

      Route::get('/fileimage/{filename}',[
            'uses' => 'BidderController@getfileImage',
            'as' => 'file.image'
      ]);

      Route::post('/updatefile',[
             'uses' => 'BidderController@fileUpload',
             'as' => 'file.save'
      ]);

      Route::get('/compliance', [
            'uses' => 'BidderController@compliance',
            'as' => 'compliance.bidder'
      ]);

      Route::post('/edit.compliance' ,[
            'uses' => 'BidderController@editCompliance',
            'as' => 'edit.compliance'
      ]);

      Route::post('/postCompliance',[
            'uses'  => 'BidderController@postCompliance',
            'as' => 'post.compliance'
      ]);
      Route::get('/info',[
             'uses' => 'BidderController@info_page',
             'as' => 'bidder.winner'
      ]);

      // ########################### Home Route #############################

      Route::get('/payment', [
            'uses'=>'HomeController@payment',
            'as' => 'payment'
      ]);

      Route::get('/super', [
            'uses'=> 'SuperAdminController@super_view',
            'as'=>'super'
      ]);

      Route::post('/admin.assign', [
            'uses' => 'SuperAdminController@permissions',
            'as'=>'admin.assign'
      ]);

      Route::post('/sendEmail', [
            'uses' => 'MailController@superSendEmail',
            'as' => 'sendEmail.super'
      ]);

      Route::get('email', ['uses'=>'MailController@email']);

      Route::get('/po', [
            'uses'=>'ProcurementController@po',
            'as'=> 'po'
      ]);

      Route::post('/po_data', [
            'uses'=>'ProcurementController@store_po',
            'as'=>'po_data'
       ]);

       Route::get('/posted-tender',[
            'uses' => 'ProcurementController@posted_bid',
            'as' => 'posted.tender'
       ]);

       Route::get('/download/{name}', [
             'uses' => 'CommitteChairController@download',
             'as' => 'download'

       ]);

      Route::post('/reply.compliance', [
             'uses' => 'CommitteChairController@replyCompliance',
             'as'=>'reply.compliance'
      ]);

      Route::get('/coc', [
            'uses'=>'CommitteChairController@committe_chair_page',
            'as'=>'coc'
      ]);
      // coc bidding
      Route::get('/bidding/{id}', [
            'uses' => 'CommitteChairController@bidding_page',
            'as'=>'bidding'
      ]);

      Route::get('/decision', [
            'uses'=>'CommitteChairController@decision_page',
            'as'=>'decision'
      ]);

      Route::get('/listCompliance',[
            'uses' => 'CommitteChairController@compliance',
            'as' => 'compliance.coc'
      ]);

      Route::get('/information', [
             'uses' => 'CommitteChairController@informations',
             'as'=>'info.coc'
      ]);

      Route::get('/manager', [
            'uses'=>'ManagerController@showTenderDetail',
            'as' => 'manager'
      ]);

      Route::get('/approved', [
            'uses'=>'ManagerController@approvedTender',
            'as' => 'approved'
      ]);


      Route::post('/createPost', [
            'uses'=>'ManagerController@createTenderPost',
            'as'=>'createPost'
      ]);

      Route::get('/approveTender/{tender_id}', [
            'uses' => 'ManagerController@approveTender',
            'as' => 'approveTender'
      ]);

      Route::get('/add-bidder', [
            'uses'=>'ManagerController@bidder_list',
            'as'=>'add-bidder'
      ]);
      Route::get('/paid', [
            'uses' => 'ManagerController@payment',
            'as' => 'paid'
      ]);

      Route::get('/home', [
            'uses'=>'HomeController@home',
            'as'=> 'home'
      ]);
      Route::get('/detail/{id}', [
            'uses' => 'HomeController@detail',
            'as'=>'detail'
      ]);

      Route::get('/', ['uses'=>'HomeController@home']);

      // Route::auth();

       Route::get('/logout', [
             'uses'=>'AdminController@logout'
       ])->name('user.logout');
       Route::get('/error404',[
             'uses' => 'CommitteChairController@bidding_page'
       ]);

});

