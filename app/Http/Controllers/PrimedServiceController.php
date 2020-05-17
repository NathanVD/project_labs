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

        $request->validate([
            'titre_1'=>'nullable|RequiredWithout:surlignement,titre_2|string',
            'surlignement'=>'nullable|RequiredWithout:titre_1,titre_2|string',
            'titre_2'=>'nullable|RequiredWithout:surlignement,titre_1|string',
            'bouton'=>'required|string',
        ]);

        if (!$title) {
            $title = new Primed_services;
        }

        $title->title_1 = request('titre_1');
        $title->highlight = request('surlignement');
        $title->title_2 = request('titre_2');
        $title->button = request('bouton');

        $title->save();

        alert()->toast('Modification enregistrée !','success')->width('20rem');

        return redirect()->route('services.primed');
    }
}
