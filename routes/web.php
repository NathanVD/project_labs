<?php

use Illuminate\Support\Facades\Route;
use App\Navlinks;
use App\Logo;
use App\Footer;
use App\Carousel;
use App\Tagline;
use App\About;
use App\Video;

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
    $footer = Footer::find(1);
    $carousel = Carousel::all();
    $tagline = Tagline::find(1);
    $about = About::find(1);
    $video = Video::find(1);

    return view('home',compact('navlinks','logo','footer','carousel','tagline','about','video'));
});
Route::get('/services', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);

    return view('services',compact('navlinks','logo','footer'));
});
Route::get('/blog', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);

    return view('blog',compact('navlinks','logo','footer'));
});
Route::get('/contact', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);

    return view('contact',compact('navlinks','logo','footer'));
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

//Footer 
Route::get('/admin/footer', 'FooterController@edit')->name('footer');
Route::post('/admin/footer/update', 'FooterController@update')->name('footer.update');

//Carousel 
Route::get('/admin/home_banner/tagline', 'TaglineController@edit')->name('tagline');
Route::post('/admin/home_banner/tagline/update', 'TaglineController@update')->name('tagline.update');
Route::resource('admin/home_banner', 'CarouselController');

//About 
Route::get('/admin/about', 'AboutController@edit')->name('about');
Route::post('/admin/about/update', 'AboutController@update')->name('about.update');

//About 
Route::get('/admin/video', 'VideoController@edit')->name('video');
Route::post('/admin/video/update', 'VideoController@update')->name('video.update');

/*
| End admin
*/


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


