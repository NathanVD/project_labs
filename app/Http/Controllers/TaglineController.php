<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagline;

class TaglineController extends Controller
{
    public function edit() {

        $tagline = Tagline::find(1);

        return view('admin.home_banner.tagline',compact('tagline'));
    }

    public function update() {

        $tagline = Tagline::find(1);

        if (!$tagline) {
            $tagline = new Tagline;
        }

        $tagline->line = request('line');

        $tagline->save();

        return redirect()->route('admin');
    }
}
