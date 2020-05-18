<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Navlinks;use App\Logo;use App\Footer;use App\Carousel;use App\Tagline;
use App\About;use App\Video;use App\Testimonial;use App\TestiTitle;use App\Ready;
use App\Contact;use App\Team;use App\Team_Title;use App\Starred;use App\Service;
use App\Services_Title;use App\Primed_Services;use App\Article;use App\Category;
use App\Tag;use App\Map;use App\User;

class ProfilController extends Controller
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

    public function index($id) {
        if (Auth::user() && Auth::user()->id == $id) {
            $navlinks = Navlinks::find(1);
            $logo = Logo::find(1);
            $footer = Footer::find(1);
            $user = User::find($id);
            return view('profil_page',compact('navlinks','logo','footer','user'));
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $id) {

        $user = User::find($id);

        $request->validate([
            'nom'=>'required|string',
            'email'=>'required|email',
        ]);

        $user->name = request('nom');
        $user->email = request('email');
        if (request('photo')) {
            $user->photo_path = request('photo')->store('img');
        }
        $user->description = request('description');

        $user->save();

        alert()->toast('Modification enregistrée !','success')->width('20rem');

        return redirect()->back();
    }
}
