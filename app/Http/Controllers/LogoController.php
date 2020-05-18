<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Support\Facades\Storage;
use App\Logo;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        if (Gate::allows('webmaster-power')) {
            $logo = Logo::find(1);

            return view('admin.logo', compact('logo'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function update(Request $request)
    {
        if (Gate::allows('webmaster-power')) {
            $logo = Logo::find(1);

            $request->validate([
                'logo'=>'required|image',
            ]);

            if (!$logo) {
                $logo = new Logo;
            }

            Storage::delete($logo->logo_path);

            $logo->logo_path = request('logo')->store('img');

            $logo->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('logo');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	      return redirect()->back();
        }

    }
}
