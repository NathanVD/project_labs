<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Str;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;

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

Route::get('/services', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);
    $contact = Contact::find(1);
    $services_chunks = Service::all()->sortByDesc('created_at')->chunk(9);
    $services_title = Services_Title::find(1);
    $primed_services = Service::all()->sortByDesc('created_at')->chunk(6)->first();
    $primed_services_title = Primed_Services::find(1);
    $articles = Article::all()->where('approved',true)->sortByDesc('updated_at')->chunk(3)->first();

    return view('services',compact('navlinks','logo','footer','contact',
    'services_chunks','services_title','primed_services','primed_services_title','articles'));
})->name('services');
Route::get('/blog', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);
    $articles = Article::where('approved',true)->orderBy('updated_at','desc')->paginate(3);
    // $articles->content = Str::limit($articles->content,315);
    $categories = Category::all()->shuffle()->chunk(6)->first();
    $tags = Tag::all()->shuffle()->chunk(9)->first();

    return view('blog',compact('navlinks','logo','footer','articles','categories','tags'));
})->name('blog');
Route::get('/blog_post/{id}', function ($id) {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);
    $article = Article::find($id);
    $categories = Category::all()->shuffle()->chunk(6)->first();
    $tags = Tag::all()->shuffle()->chunk(9)->first();

    return view('blog_post',compact('navlinks','logo','footer','article','categories','tags'));
})->name('blog_post');
Route::get('/contact', function () {

    $navlinks = Navlinks::find(1);
    $logo = Logo::find(1);
    $footer = Footer::find(1);
    $contact = Contact::find(1);
    $map = Map::find(1);

    return view('contact',compact('navlinks','logo','footer','contact','map'));
})->name('contact');
/* 
| End page publiques
*/

/*
| Admin
*/
Route::get('/admin', function () {
    $testimonials_count = Testimonial::count();
    $last_testimonial = Testimonial::latest('created_at')->first();

    return view('admin.index', compact('testimonials_count','last_testimonial'));
})->name('admin');

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

/*
| End admin
*/