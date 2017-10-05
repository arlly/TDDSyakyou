<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/roomlist/{date}', 'RoomListController@index')->name('roomlist.index');
Route::get('/bookingSingle/{date}', 'RoomListController@bookingSingleRoom')->name('roomlist.bookingSingle');
Route::get('/bookingDouble/{date}', 'RoomListController@bookingDoubleRoom')->name('roomlist.bookingDouble');
    
    
Route::get('/testMail', 'MailController@sendTestEmail')->name('testMail.index');

