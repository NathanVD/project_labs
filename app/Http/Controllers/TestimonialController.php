<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\TestiTitle;
use App\Testimonial;

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
    protected function redirectTo($request)
    {
        return route('login');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = TestiTitle::find(1);
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index', compact('title','testimonials'));
    }

    /*
    / Partie Titre
    */
    public function titleUpdate(Request $request) {

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
    }
    /*
    /Fin partie Titre
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);

        return view('admin.testimonials.edit',compact('testimonial'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        Storage::delete($testimonial->profile_picture_path);

        $testimonial->delete();

        alert()->toast('Témoignage supprimé !','error')->width('20rem');

        return redirect()->route('testimonials.index');
    }
}
