<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Primed_Services;

class PrimedServiceController extends Controller
{
    public function edit() {

        $title = Primed_services::find(1);

        return view('admin.services.primed',compact('title'));
    }

    public function update(Request $request) {

        $title = Primed_services::find(1);

        if (!$title) {
            $title = new Primed_services;
        }

        $title->title_1 = request('title_1');
        $title->highlight = request('highlight');
        $title->title_2 = request('title_2');
        $title->button = request('button');

        $title->save();

                $request->validate([
            'ligne'=>'required|string',
        ]);
        alert()->toast('Modification enrégistrée !','success')->width('20rem');

        return redirect()->route('services.primed');
    }
}
