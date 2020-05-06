<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::find(1);

        return view('admin.footer', compact('footer'));
    }

    public function update()
    {
        $footer = Footer::find(1);

        if (!$footer) {
            $footer = new Footer;
        }

        $footer->line = request('line');

        $footer->save();

        return redirect()->route('admin');
    }
}
