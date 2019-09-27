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

Route::get('/',function(){
    return view('frontend.index');
})->name('my-home');


Route::get('/login', function () {
    return view('welcome');
})->name('login');

Route::get('/book',function(){
    return view('frontend.book-form');
})->name('book');


Auth::routes();

Route::get('/register',function(){
    return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/search-bus','BusController@displayBus')->name('display-bus');
Route::post('/bus-detail','BusController@displayBusDetails')->name('bus-detail');
Route::post('/book-ticket','TicketController@storeTicket')->name('store-ticket');
Route::post('/tickets','TicketController@printTickets')->name('print-ticket');
Route::post('/reservation','ReservationController@saveReservation')->name('reservation');
Route::get('/receive-ticket','ReservationController@index')->name('receive-ticket');
Route::get('/view-booking','ReservationController@displayReservations')->name('view-booking');
Route::get('/contact-us','ContactController@create')->name('contact-us');
Route::post('/contact-save','ContactController@store')->name('contact-save');
Route::get('/about-us',function(){
    return view('frontend.about-us');
})->name('about-us');


Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
  
    Route::get('/','HomeController@admin')->name('admin');
    Route::resource('/bus','BusController');
    Route::resource('/admin','UserController');
    Route::get('/view-reservation','ReservationController@admin')->name('reservation-admin');
    Route::delete('/delete-reservation/{id}','ReservationController@delete')->name('delete-reservation');
    Route::get('/profile-edit/{id}','UserController@editProfile')->name('edit-profile');
    Route::put('/profile-update/{id}','UserController@updateProfile')->name('update-profile');
});

Route::group(['prefix'=>'passenger','middleware'=>['auth','passenger']],function(){
    Route::get('/','HomeController@passenger')->name('passenger');
});



