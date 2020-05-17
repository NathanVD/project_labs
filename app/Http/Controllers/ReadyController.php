<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ready;

class ReadyController extends Controller
{
    public function edit() {

        $ready = Ready::find(1);

        return view('admin.ready',compact('ready'));
    }

    public function update(Request $request) {

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
    }
}
