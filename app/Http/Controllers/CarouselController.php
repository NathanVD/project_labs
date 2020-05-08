<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Carousel;
use App\Tagline;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagline = Tagline::find(1);
        $carousels = Carousel::all();

        return view('admin.carousel.index', compact('carousels','tagline'));
    }

    /*
    / Partie Slogan
    */
    public function taglineUpdate() {

        $tagline = Tagline::find(1);

        if (!$tagline) {
            $tagline = new Tagline;
        }

        $tagline->line = request('line');

        $tagline->save();

        return redirect()->route('carousel.index');
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
        $carousel = new Carousel();

        $carousel->img_path = request('img')->store('img');

        $carousel->save();

        return redirect()->route('carousel.index');
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
        $image = Carousel::find($id);

        return view('admin.carousel.edit', compact('image'));
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
        $carousel = Carousel::find($id);

        if(request('img')){
            Storage::delete($carousel->img_path);
            $carousel->img_path = request('img')->store('img');
        }

        $carousel->save();

        return redirect()->route('carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::find($id);

        Storage::delete($carousel->img_path);

        $carousel->delete();

        return redirect()->route('carousel.index');
    }
}
