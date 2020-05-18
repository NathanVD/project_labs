<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;

class BlogpageController extends Controller
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
        $articles = Article::where('approved',true)->orderBy('updated_at','desc')->paginate(3);
        // $articles->content = Str::limit($articles->content,315);
        $categories = Category::all()->shuffle()->chunk(6)->first();
        $tags = Tag::all()->shuffle()->chunk(9)->first();

        return view('blog',compact('navlinks','logo','footer','articles','categories','tags'));
    }
}
