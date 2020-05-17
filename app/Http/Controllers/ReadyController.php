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

        if (!$ready) {
            $ready = new Ready;
        }

        $ready->title = request('title');
        $ready->subtitle = request('subtitle');
        $ready->button = request('button');

        $ready->save();

                $request->validate([
            'ligne'=>'required|string',
        ]);
        alert()->toast('Modification enrégistrée !','success')->width('20rem');

        return redirect()->route('ready');
    }
}
