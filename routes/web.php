<?php

use Illuminate\Support\Facades\Route;
use App\Navlinks;

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

    $navlinks = Navlinks::find(1);

    return view('home',compact('navlinks'));
});
Route::get('/services', function () {

    $navlinks = Navlinks::find(1);

    return view('services',compact('navlinks'));
});
Route::get('/blog', function () {

    $navlinks = Navlinks::find(1);

    return view('blog',compact('navlinks'));
});
Route::get('/contact', function () {

    $navlinks = Navlinks::find(1);

    return view('contact',compact('navlinks'));
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Subscribe (admin)
Route::get('/admin/nav', 'NavlinksController@edit')->name('nav');
Route::post('/admin/nav/update', 'NavlinksController@update')->name('nav.update');
