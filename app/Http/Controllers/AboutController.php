<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\About;
Use Alert;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $about = About::find(1);

            return view('admin.about',compact('about'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $about = About::find(1);

            if (!$about) {
                $about = new About;
            }

            $request->validate([
                'titre_1'=>'nullable|RequiredWithout:surlignement,titre_2|string',
                'surlignement'=>'nullable|RequiredWithout:titre_1,titre_2|string',
                'titre_2'=>'nullable|RequiredWithout:surlignement,titre_1|string',
                'colonne_1'=>'required',
                'colonne_2'=>'required',
                'bouton'=>'nullable|required_if:bouton_visible,on|string',
                'bouton_visible'=>'nullable|in:on,null'
            ]);

            $about->title_1 = request('titre_1');
            $about->highlight = request('surlignement');
            $about->title_2 = request('titre_2');
            $about->col_1 = request('colonne_1');
            $about->col_2 = request('colonne_2');
            $about->button = request('bouton');
            $about->button_visible = request('bouton_visible');

            $about->save();

            alert()->toast('Modification enrégistrée !','success')->width('20rem');

            return redirect()->route('about');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }
}
