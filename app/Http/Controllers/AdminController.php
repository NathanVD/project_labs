<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;use App\Message;;use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::allows('webmaster-power')) {

            $testimonials_count = Testimonial::count();
            $last_testimonial = Testimonial::latest('created_at')->first();

            $messages_count = Message::count();
            $last_message = Message::latest('created_at')->first();

            $users_count = User::count();
            $last_user = User::latest('created_at')->first();

            return view('admin.index', compact('testimonials_count','last_testimonial','messages_count',
            'last_message','users_count','last_user'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }
}
