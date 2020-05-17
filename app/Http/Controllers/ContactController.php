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

        if (!$contact) {
            $contact = new Contact;
        }

        $contact->title = request('title');
        $contact->description = request('description');
        $contact->data_title = request('data_title');
        $contact->adress_1 = request('adress_1');
        $contact->adress_2 = request('adress_2');
        $contact->phone = request('phone');
        $contact->email = request('email');
        $contact->button = request('button');

        $contact->save();

                $request->validate([
            'ligne'=>'required|string',
        ]);
        alert()->toast('Modification enrégistrée !','success')->width('20rem');

        return redirect()->route('contact');
    }
}
