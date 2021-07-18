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
      ])->name('bidder.login');

      Route::post('/admin.login', [
            'uses' => 'AdminController@signIn',
            'as' => 'admin.signIn'
      ]);

      Route::get('/admin.login',[
            'uses' => 'AdminController@signInView'
      ])->name('admin.login');

      Route::get('/check', function () {
            return view('admin.committe-chair.complaint');
        });

      // ################# Bidder Route ##################


      Route::group(['middleware'=>'auth:bidder'],function(){

      Route::get('/bidder',[
            'uses'=>'BidderController@dashboard',
            'as'=>'bidder',
      ]);

      Route::post('/signature',[
        'uses'=>'BidderController@storeSignature'
      ]);

      Route::post('/bidder.info', [
        'uses' => 'BidderController@BidderInfo',
        'as' => 'bidder.info'
      ]);

      Route::get('/forms',[
        'uses'=>'BidderController@forms',
        'as'=>'bidder.form'
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
      Route::post('/income',[
             'uses'=>'BidderController@income',
             'as'=>'income'
      ]);
      Route::post('/auditor',[
            'uses'=>'BidderController@auditorInfo',
            'as'=>'auditor.info'
      ]);
      Route::get('/generatepdf',[
            'uses'=>'BidderController@createPDF',
            'as'=>'generate.pdf'
      ]);
      Route::post('/finance', [
            'uses'=>'BidderController@BidderFinance',
            'as'=>'bidder.finance'
      ]);

      Route::post('/bidderOtherFiles',[
            'uses'=>'BidderController@bidderOtherFiles',
            'as'=>'bidder.other.files'
      ]);

     });

    // Route::get('/generatepdf', function(){
    //          $pdf  = App::make('snappy.pdf.wrapper');
    //          $html = '<h1>hello pdf genreated</h1>';
    //          $pdf->generateFromHtml($html, 'hello.pdf');

    //          $pdf->inline();
    // });

      // ########################### Payment Route ################################3

      Route::get('/payment', [
            'uses'=>'PaymentController@index',
            'as' => 'payment'
      ]);

      Route::post('/pay', [
        'uses'=>'PaymentController@charge',
        'as' => 'charge'
      ]);

      Route::group(['middleware'=>'auth:web'],function(){

     // ############################ Super Administrator Route ######################
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

      Route::get('/delete.admins/{id}' , [
            'uses' => 'SuperAdminController@deleteAdmins',
            'as' => 'delete.admins'
      ]);
      // #################### Procurement Officer ##################################

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
       Route::post('/techReview', [
            'uses' => 'ProcurementController@TechnicalPoint',
            'as' => 'techReview'
       ]);

       // ##################### Committe Chair Route #########################

       Route::get('/download/{name}', [
             'uses' => 'CommitteChairController@download',
             'as' => 'download'

       ]);

       Route::get('/otherDownload/{name}', [
             'uses' => 'CommitteChairController@otherDownload',
             'as' => 'otherDownload'

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
             'as'=>'information.page'
      ]);

      Route::get('/finance', [
             'uses' => 'CommitteChairController@finance',
             'as' => 'finance'
      ]);
      Route::get('/BidderFinancial.detail/{bidder_id}', [
        'uses' => 'CommitteChairController@BidderFinance',
        'as' =>'BidderFinancial.detail'
      ]);
      Route::post('/techical.result/{id}',[
        'uses'=> 'CommitteChairController@technicalBidResult',
        'as'=>'techical.result'
      ]);

      Route::get('/table.view', [
        'uses'=> 'CommitteChairController@tableView',
        'as' => 'table.view'
      ]);

      Route::post('/info.coc', [
        'uses' => 'CommitteChairController@post_info',
        'as' => 'info.coc'
      ]);
      Route::get('/infodelete/{info_id}',[
        'uses' => 'CommitteChairController@infodelete',
        'as'=>'info.coc.delete'
      ]);
      Route::get('/clear.data',[
          'uses'=>'CommitteChairController@clear_data',
          'as' => 'clear.data'
      ]);

      // ###################### Manager Route ##############################

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
      Route::get('/disaproveTender/{tender_id}',[
            'uses' => 'ManagerController@disapproveTender',
            'as'=>'disaproveTender'
      ]);

      Route::get('/add-bidder', [
            'uses'=>'ManagerController@bidder_list',
            'as'=>'add-bidder'
      ]);
      Route::get('/paid', [
            'uses' => 'ManagerController@payment',
            'as' => 'paid'
      ]);
      Route::post('/manager.mail', [
            'uses' => 'MailController@managerSendEmail',
            'as' => 'manager.mail'
      ]);
      Route::get('/telegram',[
            'uses' => 'ManagerController@telegramView',
            'as' => 'telegram.view'
      ]);

      Route::post('/telegram.post', [
           'uses' => 'TelegramController@sendMessage',
           'as'=>'telegram.post'
         ]);

    Route::get('/deleteTgMember/{memberId}', [
           'uses' => 'ManagerController@deleteTgMember',
           'as'=>'deleteTgMember'
    ]);

      });

       // ####################### Home  Route ############################

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

       Route::get('/admin.logout', [
             'uses'=>'AdminController@logout',
             'as'=> 'admin.logout'
       ]);

       Route::get('/logout', [
             'uses'=>'UserController@logout',
             'as'=> 'bidder.logout'
       ]);

       Route::get('/error404',[
             'uses' => 'CommitteChairController@bidding_page'
       ]);

 });

