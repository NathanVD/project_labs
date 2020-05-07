<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index', compact('testimonials'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial;

        $testimonial->profile_picture_path = request('picture')->store('img');
        $testimonial->first_name = request('first_name');
        $testimonial->last_name = request('last_name');
        $testimonial->job_title = request('job_title');
        $testimonial->testimony = request('testimony');

        $testimonial->save();

        return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        if (request('picture')) {
            Storage::delete($testimonial->profile_picture_path);
            $testimonial->profile_picture_path = request('picture')->store('img');
        };
        $testimonial->first_name = request('first_name');
        $testimonial->last_name = request('last_name');
        $testimonial->job_title = request('job_title');
        $testimonial->testimony = request('testimony');

        $testimonial->save();

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

        return redirect()->route('testimonials.index');
    }
}
