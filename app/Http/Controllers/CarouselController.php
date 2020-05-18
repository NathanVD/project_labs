<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Carousel;
use App\Tagline;
Use Alert;

class CarouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('webmaster-power')) {
            $tagline = Tagline::find(1);
            $carousels = Carousel::all();

            return view('admin.carousel.index', compact('carousels','tagline'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }

    /*
    / Partie Slogan
    */
    public function taglineUpdate(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $tagline = Tagline::find(1);

            $request->validate([
                'slogan'=>'required|string',
            ]);

            if (!$tagline) {
                $tagline = new Tagline;
            }

            $tagline->line = request('slogan');

            $tagline->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('carousel.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }
    /*
    /Fin partie Slogan
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                if (Gate::allows('webmaster-power')) {
            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('webmaster-power')) {
            $carousel = new Carousel();

            $request->validate([
                'image'=>'required|image',
            ]);

            $carousel->img_path = request('image')->store('img');

            $carousel->save();

            alert()->toast('Image ajoutée !','success')->width('20rem');

            return redirect()->route('carousel.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('webmaster-power')) {
            $image = Carousel::find($id);

            return view('admin.carousel.edit', compact('image'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('webmaster-power')) {
            $carousel = Carousel::find($id);

            if(request('image')){

                $request->validate([
                    'image'=>'required|image',
                ]);

                Storage::delete($carousel->img_path);
                $carousel->img_path = request('image')->store('img');
            }

            $carousel->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');
            
            return redirect()->route('carousel.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('webmaster-power')) {
            $carousel = Carousel::find($id);

            Storage::delete($carousel->img_path);

            $carousel->delete();

            alert()->toast('Image supprimée !','error')->width('20rem');

            return redirect()->route('carousel.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
