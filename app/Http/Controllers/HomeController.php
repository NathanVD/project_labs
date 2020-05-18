<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;

class HomeController extends Controller
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
        $carousel = Carousel::all();
        $tagline = Tagline::find(1);
        $about = About::find(1);
        $video = Video::find(1);
        $testimonials = Testimonial::all()->sortByDesc('created_at')->chunk(6)->first();
        $testiTitle = TestiTitle::find(1);
        $services_chunks = Service::all()->sortByDesc('created_at')->chunk(9);
        $services_title = Services_Title::find(1);
        $ready = Ready::find(1);
        $contact = Contact::find(1);
        $starred = Starred::find(1);
        $team1 = Team::all()->where('role');
        if ($starred && $team1->count() <= 1) {
            $team  = $team1->replace([0 => $starred]);
        } else if ($starred) {
            $team = $team1->whereNotIn('id',$starred->member_id)->shuffle();
            $team_2 = $team[1];
            $team = $team->replace([1 => $starred])->push($team_2)->chunk(3)->first();
        } else {
            $team = $team1->shuffle()->chunk(3)->first();
        };
        $team_title = Team_Title::find(1);

        return view('home',compact('navlinks','logo','footer','carousel',
        'tagline','about','video','testimonials','testiTitle','ready','contact',
        'team','team_title','services_chunks','services_title' ));
    }
}
