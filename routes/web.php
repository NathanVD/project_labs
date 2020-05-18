<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Str;


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

Auth::routes();

/*
| Page publiques
*/
/**
 * Home
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/services', 'ServicespageController@index')->name('services');
Route::get('/blog', 'BlogpageController@index')->name('blog');
Route::get('/blog_post/{id}', 'BlogPostpageController@index')->name('blog_post');
Route::get('/contact', 'ContactpageController@index')->name('contact');
Route::get('/profil_page/{id}', 'ProfilController@index')->name('profil_page');
Route::post('/profil_page/{id}/update', 'ProfilController@update')->name('profil_page.update');
/* 
| End page publiques
*/

/*
| Admin
*/
Route::get('/admin', 'AdminController@index')->name('admin');

//Nav 
Route::get('/admin/nav', 'NavlinksController@edit')->name('nav');
Route::post('/admin/nav/update', 'NavlinksController@update')->name('nav.update');

//Logo 
Route::get('/admin/logo', 'LogoController@edit')->name('logo');
Route::post('/admin/logo/update', 'LogoController@update')->name('logo.update');

//Footer 
Route::get('/admin/footer', 'FooterController@edit')->name('footer');
Route::post('/admin/footer/update', 'FooterController@update')->name('footer.update');

//Carousel 
Route::post('/admin/carousel/tagline/update', 'CarouselController@taglineUpdate')->name('carousel.tagline.update');
Route::resource('admin/carousel', 'CarouselController');

//About 
Route::get('/admin/about', 'AboutController@edit')->name('about');
Route::post('/admin/about/update', 'AboutController@update')->name('about.update');

//Video 
Route::get('/admin/video', 'VideoController@edit')->name('video');
Route::post('/admin/video/update', 'VideoController@update')->name('video.update');

//Testimonials
Route::post('/admin/testimonials/title/update', 'TestimonialController@titleUpdate')->name('testimonial.title.update');
Route::resource('admin/testimonials', 'TestimonialController');

//Team
Route::post('/admin/team/{id}/starred_member/update', 'TeamController@starredUpdate')->name('team.starred_member.update');
Route::delete('/admin/team/starred_member/remove', 'TeamController@starredRemove')->name('team.starred_member.remove');
Route::post('/admin/team/title/update', 'TeamController@titleUpdate')->name('team.title.update');
Route::resource('admin/team', 'TeamController');

//Ready 
Route::get('/admin/ready', 'ReadyController@edit')->name('ready');
Route::post('/admin/ready/update', 'ReadyController@update')->name('ready.update');

//Infos contact
Route::get('/admin/contact', 'ContactController@edit')->name('contact');
Route::post('/admin/contact/update', 'ContactController@update')->name('contact.update');

//Map
Route::get('/admin/map', 'MapController@edit')->name('map');
Route::post('/admin/map/update', 'MapController@update')->name('map.update');

//Services
Route::get('/admin/services/primed', 'PrimedServiceController@edit')->name('services.primed');
Route::post('/admin/services/primed/update', 'PrimedServiceController@update')->name('services.primed.update');
Route::post('/admin/services/title/update', 'ServiceController@titleUpdate')->name('services.title.update');
Route::resource('admin/services', 'ServiceController');

//Blog
 // Articles
Route::post('/admin/blog/articles/{article}/approve', 'ArticleController@approve')->name('article.approve');
Route::get('/blog/articles/{article}/comments', 'ArticleController@comments')->name('article.comments');
Route::resource('admin/blog/articles', 'ArticleController');
 // Categories & Tags
Route::delete('/admin/blog/tags/{id}/remove', 'CategoryController@rmTag')->name('tags.remove');
Route::resource('admin/blog/categories', 'CategoryController');
 // Commentaires
Route::post('/admin/blog/comments/{article}/addComment', 'CommentController@addComment')->name('comments.addComment');
Route::resource('admin/blog/comments', 'CommentController');

//Newsletter
Route::get('/admin/blog/subscribers', 'NewsletterController@subscribers')->name('newsletter');
Route::post('/newsletter/subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');
Route::delete('/newsletter/{email}/unsubscribe', 'NewsletterController@unsubscribe')->name('newsletter.unsubscribe');

//Messages
// Route::get('/admin/inbox/confirmation_email/preview', 'MessageController@messageConfirmPreview')->name('inbox.message_confirm.preview');
Route::get('/admin/inbox/message_email', 'MessageController@messageEmail')->name('inbox.message_email');
Route::post('/admin/inbox/message_email/update', 'MessageController@messageEmailUpdate')->name('inbox.message_email.update');
Route::get('/admin/inbox/newsletter_email', 'MessageController@newsletterEmail')->name('inbox.newsletter_email');
Route::post('/admin/inbox/newsletter_email/update', 'MessageController@newsletterEmailUpdate')->name('inbox.newsletter_email.update');
Route::get('/admin/inbox/blogPost_email', 'MessageController@blogPostEmail')->name('inbox.blogPost_email');
Route::post('/admin/inbox/blogPost_email/update', 'MessageController@blogPostEmailUpdate')->name('inbox.blogPost_email.update');
Route::resource('admin/inbox', 'MessageController');

//Users
Route::get('/admin/users', 'UserController@index')->name('users');
Route::post('/admin/users/update', 'UserController@update')->name('users.update');
/*
| End admin
*/