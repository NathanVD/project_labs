<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('ultimate-power')) {
            $users = User::All();

            return view('admin.users.index', compact('users'));
        } else {
            alert()->warning('Tu dois être admin pour effectuer cette action');
	        return redirect()->back();
        }
    }

    public function edit(Request $request,$id) {
        if (Gate::allows('ultimate-power')) {
            $user = User::find($id);

            $user->roles->attach(request('roles'));

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('admin.users.index');            
        } else {
            alert()->warning('Tu dois être admin pour effectuer cette action');
	        return redirect()->back();
        }
 
    }
}
