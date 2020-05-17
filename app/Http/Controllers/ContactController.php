<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
Use Alert;

class ContactController extends Controller
{
    public function edit() {

        $contact = Contact::find(1);

        return view('admin.contact',compact('contact'));
    }

    public function update(Request $request) {

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
    }
}
