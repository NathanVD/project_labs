<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Footer;
use Alert;

class FooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        if (Gate::allows('webmaster-power')) {
            $footer = Footer::find(1);

            return view('admin.footer', compact('footer'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function update(Request $request)
    {
        if (Gate::allows('webmaster-power')) {
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
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
