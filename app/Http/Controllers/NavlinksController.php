<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Navlinks;

class NavlinksController extends Controller
{
    public function edit() {

        $links = Navlinks::find(1);

        return view('admin.nav',compact('links'));
    }

    public function update(Request $request) {

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
    }
}
