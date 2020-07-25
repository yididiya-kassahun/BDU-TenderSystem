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
Route::get('/check', function () {
      return view('admin.committe-chair.complaint');
  });

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/bidder',[
      'uses'=>'BidderController@dashboard',
      'as'=>'bidder'
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

Route::post('/postCompliance',[
      'uses'  => 'BidderController@postCompliance',
      'as' => 'post.compliance'
]);

Route::get('/bidder_registration',[
      'uses'=>'BidderController@bidder_registration'
]);

Route::get('/register', function () { 
      return view('auth.register-admin');
});

Route::get('/payment', [
      'uses'=>'HomeController@payment',
      'as' => 'payment'
]);

Route::get('/super', function(){
      return view('admin.super-admin.admin');
});

Route::get('/po', ['uses'=>'ProcurementController@po']);

Route::post('/po_data', [
      'uses'=>'ProcurementController@store_po',
      'as'=>'po_data'               
 ]);

Route::get('/coc', [
      'uses'=>'CommitteChairController@committe_chair_page',
      'as'=>'coc'
]);
// coc bidding
Route::get('/bidding', [
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

Route::get('/home', [
      'uses'=>'HomeController@home',
      'as'=> 'home'
]);

Route::get('/', ['uses'=>'HomeController@home']);

// Route::auth();

 Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
