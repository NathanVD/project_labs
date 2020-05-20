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
        $categories = Category::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(6)->first();
        $tags = Tag::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(9)->first();
        
        $articles = Article::where('approved',true)->orderBy('updated_at','desc')->paginate(3);

        return view('blog',compact('navlinks','logo','footer','articles','categories','tags'));
    }

    public function show($id)
    {
        $navlinks = Navlinks::find(1);
        $logo = Logo::find(1);
        $footer = Footer::find(1);
        $categories = Category::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(6)->first();
        $tags = Tag::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(9)->first();
        
        $article = Article::find($id);

        return view('blog_post',compact('navlinks','logo','footer','article','categories','tags'));
    }

    public function search(Request $request)
    {
        $navlinks = Navlinks::find(1);
        $logo = Logo::find(1);
        $footer = Footer::find(1);
        $categories = Category::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(6)->first();
        $tags = Tag::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(9)->first();

        $search = request('recherche');

        $articles = Article::where('approved',true)->where('title','LIKE',"%{$search}%")->paginate(3);
          
        return view('blog_search',compact('navlinks','logo','footer','articles','categories','tags','search'));
    }

    public function cat_search($search)
    {
        $navlinks = Navlinks::find(1);
        $logo = Logo::find(1);
        $footer = Footer::find(1);
        $categories = Category::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(6)->first();
        $tags = Tag::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(9)->first();

        $cat = Category::where('name',$search)->first()->id;

        $articles = Article::where('approved',true)->where('category_id',$cat)->paginate(3);
          
        return view('blog_search',compact('navlinks','logo','footer','articles','categories','tags','search'));
    }

    public function tag_search($search)
    {
        $navlinks = Navlinks::find(1);
        $logo = Logo::find(1);
        $footer = Footer::find(1);
        $categories = Category::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(6)->first();
        $tags = Tag::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(9)->first();

        $articles = Article::where('approved',true)->whereHas('tags',function($q) use($search){
            $q->where('name',$search);
        })->paginate(3);
          
        return view('blog_search',compact('navlinks','logo','footer','articles','categories','tags','search'));
    }

    public function author_search($search)
    {
        $navlinks = Navlinks::find(1);
        $logo = Logo::find(1);
        $footer = Footer::find(1);
        $categories = Category::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(6)->first();
        $tags = Tag::whereHas('articles',function($q) {
            $q->where('approved',true);
        })->get()->shuffle()->chunk(9)->first();

        $articles = Article::where('approved',true)->whereHas('user',function($q) use($search){
            $q->where('name',$search);
        })->paginate(3);
          
        return view('blog_search',compact('navlinks','logo','footer','articles','categories','tags','search'));
    }
}
