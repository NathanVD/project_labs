<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function edit() {

        $contact = Contact::find(1);

        return view('admin.contact',compact('contact'));
    }

    public function update() {

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

        return redirect()->route('admin');
    }
}
