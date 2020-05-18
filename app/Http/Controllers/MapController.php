<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Map;

class MapController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $map = Map::find(1);

            return view('admin.map',compact('map'));
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
            return redirect()->back();
        }

    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $map = Map::find(1);

            $request->validate([
                'lieu'=>'required|string',
                'url'=>'required|url',
            ]);

            if (!$map) {
                $map = new Map;
            }

            $map->name = request('lieu');
            $map->url = request('url');

            $map->save();

            alert()->toast('Modification enrégistrée !','success')->width('20rem');

            return redirect()->route('map');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }


    }
}
