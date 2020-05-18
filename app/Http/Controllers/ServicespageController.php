<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;

class ServicespageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
    }
}
