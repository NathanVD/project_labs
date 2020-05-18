<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navlinks;
use Illuminate\Support\Facades\Auth;
use Gate;

class NavlinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $links = Navlinks::find(1);

            return view('admin.nav',compact('links'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $links = Navlinks::find(1);

            if (!$links) {
                $links = new Navlinks;
            }

            $request->validate([
                'page_1'=>'required|string',
                'page_2'=>'required|string',
                'page_3'=>'required|string',
                'page_4'=>'required|string',
            ]);

            $links->link_1 = request('page_1');
            $links->link_2 = request('page_2');
            $links->link_3 = request('page_3');
            $links->link_4 = request('page_4');

            $links->save();

            alert()->toast('Modification enrégistrée !','success')->width('20rem');

            return redirect()->route('nav');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
