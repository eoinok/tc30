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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('members', App\Http\Controllers\memberController::class);


Route::resource('memberimages', App\Http\Controllers\memberimagesController::class);

Route::get('member/newimages/{memberid}', 'App\Http\Controllers\memberimagesController@create')->name('member.newimages');

Route::get('member/search','App\Http\Controllers\MemberController@search')->name('member.search');
Route::get('member/searchform', 'App\Http\Controllers\MemberController@searchform')->name('member.searchform');

Route::get('calendar/display', 'App\Http\Controllers\CalendarController@display')->name('calendar.display');

Route::resource('courts', App\Http\Controllers\courtController::class);

Route::get('/courts/all/json', 'App\Http\Controllers\courtController@json')->name('courts.map.json');
Route::get('/courts/show/map', 'App\Http\Controllers\courtController@showmap')->name('courts.showmap');
