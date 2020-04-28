<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/student','StudentController');
// Route::get('/student','StudentController@index');
// Route::get('/student/create','StudentController@create');
// Route::post('/student/store','StudentController@store');
// Route::get('/student/show/{id}','StudentController@show');

//-----------------------++++++++==========

Route::resource('/upload','UploadfileController');
Route::get('/index','UploadfileController@index');

Route::get('/index/create','UploadfileController@create');

Route::post('/store','UploadfileController@store')->name('create.store');

Route::get('/index/show/{id}','UploadfileController@show')->name('index.show');
Route::get('/index/edit/{id}','UploadfileController@edit')->name('index.edit');

Route::post('/index/update/{id}','UploadfileController@update')->name('index.update');
Route::get('/index/destroy/{id}','UploadfileController@destroy')->name('index.destroy');

Route::get('pdf', 'UploadfileController@pdf');  // pdf in upload_file

Route::get('/index/zip/{id}','UploadfileController@downloadZip')->name('index.zip');

//--------------------------+++++++++++++++++++===========

Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

//Route::get('/customers', 'ContactFormController@create');

//---------================++++++++++++ PDF =======

 // Route::get('notes', 'NoteController@index');
 // Route::get('pdf', 'NoteController@pdf');

// --------------================== localization ===

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/{lan}', function ($lan) {
// 	App::setlocale($lan);
//     return view('welcome');
// });
//------------================

Route::get('/zipfile', 'ZipController@index');

//Route::post('/download', 'ZipController@downloadZip');

//Route::get('download-zip', 'ZipController@downloadZip');

//------=========== paypal  =====--------- 
//payment form
// Route::get('/', 'PaymentController@index');
// // route for processing payment
// Route::post('paypal', 'PaymentController@payWithpaypal');
// // route for check status of the payment
// Route::get('status', 'PaymentController@getPaymentStatus');




// Route::get('subscription', function(){
// return '<h1>Welcome to GKB Labs and Hai form subscription package</h1';
// });










