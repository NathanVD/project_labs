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

    public function update() {

        $links = Navlinks::find(1);

        if (!$links) {
            $links = new Navlinks;
        }

        $links->link_1 = request('link_1');
        $links->link_2 = request('link_2');
        $links->link_3 = request('link_3');
        $links->link_4 = request('link_4');

        $links->save();

        return redirect()->route('admin');
    }
}
