<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Primed_Services;
use Illuminate\Support\Facades\Auth;
use Gate;

class PrimedServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $title = Primed_services::find(1);

            return view('admin.services.primed',compact('title'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
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
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }


    }
}
