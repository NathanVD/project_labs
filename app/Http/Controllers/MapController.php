<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;

class MapController extends Controller
{
    public function edit() {

        $map = Map::find(1);

        return view('admin.map',compact('map'));
    }

    public function update(Request $request) {

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
    }
}
