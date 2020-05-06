<?php

use Illuminate\Support\Facades\Route;
use App\Navlinks;
use App\Logo;

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

/*
| Page publiques
*/
Route::get('/', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);

    return view('home',compact('navlinks','logo'));
});
Route::get('/services', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);

    return view('services',compact('navlinks','logo'));
});
Route::get('/blog', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);

    return view('blog',compact('navlinks','logo'));
});
Route::get('/contact', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);

    return view('contact',compact('navlinks','logo'));
});
/* 
| End page publiques
*/

/*
| Admin
*/
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

//Subscribe 
Route::get('/admin/nav', 'NavlinksController@edit')->name('nav');
Route::post('/admin/nav/update', 'NavlinksController@update')->name('nav.update');

//Logo 
Route::get('/admin/logo', 'LogoController@edit')->name('logo');
Route::post('/admin/logo/update', 'LogoController@update')->name('logo.update');
/*
| End admin
*/


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


