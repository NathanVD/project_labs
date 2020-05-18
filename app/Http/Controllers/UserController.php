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
    protected function redirectTo($request)
    {
        return route('login');
    }

    public function index()
    {
        $users = User::All();

        return view('admin.users.index', compact('users'));
    }

    public function titleUpdate(Request $request) {

        $title = TestiTitle::find(1);


        $title->title = request('titre');

        $title->save();

        alert()->toast('Modification enregistrée !','success')->width('20rem');

        return redirect()->route('testimonials.index');
    }
}
