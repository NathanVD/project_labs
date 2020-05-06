<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Logo;

class LogoController extends Controller
{
    public function edit()
    {
        $logo = Logo::find(1);

        return view('admin.logo', compact('logo'));
    }

    public function update()
    {
        $logo = Logo::find(1);

        if (!$logo) {
            $logo = new Logo;
        }

        Storage::delete($logo->logo_path);

        $logo->logo_path = request('logo')->store('img');

        $logo->save();

        return redirect()->route('admin');
    }
}
