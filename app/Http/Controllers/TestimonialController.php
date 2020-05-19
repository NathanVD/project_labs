<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\TestiTitle;
use App\Testimonial;
use Illuminate\Support\Facades\Auth;
use Gate;

class TestimonialController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('webmaster-power')) {
            $title = TestiTitle::find(1);
            $testimonials = Testimonial::all();

            return view('admin.testimonials.index', compact('title','testimonials'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }

    }

    /*
    / Partie Titre
    */
    public function titleUpdate(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $title = TestiTitle::find(1);

            $request->validate([
                'titre'=>'required|string',
            ]);

            if (!$title) {
                $title = new TestiTitle;
            }

            $title->title = request('titre');

            $title->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('testimonials.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
    /*
    /Fin partie Titre
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('webmaster-power')) {
            return view('admin.testimonials.create');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }
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
            $testimonial = new Testimonial;

            $request->validate([
                'photo'=>'required|image',
                'prénom'=>'required|string',
                'nom'=>'required|string',
                'profession'=>'required|string',
                'témoignage'=>'required',
            ]);

            $testimonial->profile_picture_path = request('photo')->store('img');
            $testimonial->first_name = request('prénom');
            $testimonial->last_name = request('nom');
            $testimonial->job_title = request('profession');
            $testimonial->testimony = request('témoignage');

            $testimonial->save();

            alert()->toast('Témoignage ajouté !','success')->width('20rem');

            return redirect()->route('testimonials.index');            
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
            $testimonial = Testimonial::find($id);

            return view('admin.testimonials.edit',compact('testimonial'));            
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
            $testimonial = Testimonial::find($id);

            $request->validate([
                'prénom'=>'required|string',
                'nom'=>'required|string',
                'profession'=>'required|string',
                'témoignage'=>'required',
            ]);

            if (request('photo')) {
                $request->validate([
                    'photo'=>'required|image',
                ]);
                Storage::delete($testimonial->profile_picture_path);
                $testimonial->profile_picture_path = request('photo')->store('img');
            };
            $testimonial->first_name = request('prénom');
            $testimonial->last_name = request('nom');
            $testimonial->job_title = request('profession');
            $testimonial->testimony = request('témoignage');

            $testimonial->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('testimonials.index');            
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
            $testimonial = Testimonial::find($id);

            Storage::delete($testimonial->profile_picture_path);

            $testimonial->delete();

            alert()->toast('Témoignage supprimé !','error')->width('20rem');

            return redirect()->route('testimonials.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
