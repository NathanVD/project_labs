<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;

class BlogPostpageController extends Controller
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
    public function index($id)
    {
        $navlinks = Navlinks::find(1);
        $logo = Logo::find(1);
        $footer = Footer::find(1);
        $article = Article::find($id);
        $categories = Category::all()->shuffle()->chunk(6)->first();
        $tags = Tag::all()->shuffle()->chunk(9)->first();

        return view('blog_post',compact('navlinks','logo','footer','article','categories','tags'));
    }
}
