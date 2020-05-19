<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('webmaster-power')) {
            $users = User::All();
            $roles = Role::All();
            $admin = Role::where('name','Admin')->first()->users()->get()->first();

            return view('admin.users', compact('users','roles','admin'));
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }

    public function update(Request $request,$id) {
        if (Gate::allows('webmaster-power')) {
            $user = User::find($id);
            $admin = Role::where('name','Admin')->first()->users()->get()->first();

            $request->validate([
                'roles'=>'required',
            ]);

            $user->roles()->detach();

            if (collect(request('roles'))->contains(1) && $admin) {
                $new_roles = collect(request('roles'))->reject(1)->toArray();

                $user->roles()->attach($new_roles);
                
                alert()->warning('Il ne peut y avoir qu\'un seul admin.');

                return redirect()->route('users');
            } else {
            $user->roles()->attach(request('roles'));

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('users');
            }

        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
