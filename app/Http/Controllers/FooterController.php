<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use Alert;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::find(1);

        return view('admin.footer', compact('footer'));
    }

    public function update(Request $request)
    {
        $footer = Footer::find(1);

        if (!$footer) {
            $footer = new Footer;
        }

        $request->validate([
            'ligne'=>'required|string',
        ]);

        $footer->line = request('ligne');

        $footer->save();

        alert()->toast('Modification enrégistrée !','success')->width('20rem');

        return redirect()->route('footer');
    }
}
