<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Contact;
Use Alert;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $contact = Contact::find(1);

            return view('admin.contact',compact('contact'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }
    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $contact = Contact::find(1);

            $request->validate([
                'titre'=>'required|string',
                'description'=>'required|string',
                'info_titre'=>'required|string',
                'adresse_1'=>'required|string',
                'adresse_2'=>'required|string',
                'téléphone'=>'required|numeric',
                'email'=>'required|email',
                'bouton'=>'required|string',
            ]);

            if (!$contact) {
                $contact = new Contact;
            }

            $contact->title = request('titre');
            $contact->description = request('description');
            $contact->data_title = request('info_titre');
            $contact->adress_1 = request('adresse_1');
            $contact->adress_2 = request('adresse_2');
            $contact->phone = request('téléphone');
            $contact->email = request('email');
            $contact->button = request('bouton');

            $contact->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('contact');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }

    }
}
