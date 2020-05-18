<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ready;
use Illuminate\Support\Facades\Auth;
use Gate;

class ReadyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $ready = Ready::find(1);

            return view('admin.ready',compact('ready'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $ready = Ready::find(1);

            $request->validate([
                'titre'=>'required|string',
                'sous-titre'=>'required|string',
                'bouton'=>'required|string',
            ]);

            if (!$ready) {
                $ready = new Ready;
            }

            $ready->title = request('titre');
            $ready->subtitle = request('sous-titre');
            $ready->button = request('bouton');

            $ready->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('ready');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }

    }
}
