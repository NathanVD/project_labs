<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function edit() {

        $about = About::find(1);

        return view('admin.about',compact('about'));
    }

    public function update() {

        $about = About::find(1);

        if (!$about) {
            $about = new About;
        }

        $about->title_1 = request('title_1');
        $about->highlight = request('highlight');
        $about->title_2 = request('title_2');
        $about->col_1 = request('col_1');
        $about->col_2 = request('col_2');
        $about->button = request('button');

        $about->save();

        return redirect()->route('admin');
    }
}
