<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Newsletter as Newsletter_mail;
use App\Newsletter;
use Mail;
use Alert;

class NewsletterController extends Controller
{

  public function subscribers()
  {
    $subscribers = Newsletter::all();

    return view('admin.blog.subscribers', compact('subscribers'));
  }

  public function subscribe(Request $request)
  {
    $subscriber = new Newsletter;

    $request->validate([
      'email'=>'required|unique:newsletters|email'
    ]);
    $subscriber->email = request('email');

    $subscriber->save();

    Mail::to($subscriber->email)->send(new Newsletter_mail());

    Alert::success('Abonnement confirmé !')
      ->position('top-end')
      ->autoClose(2000)
      ->animation('animate__heartBeat', 'animate__fadeOut')
      ->timerProgressBar();

    return redirect()->to(url()->previous() . '#newsletter');
  }

  public function unsubscribe($email)
  {
    Newsletter::where('email',$email)->delete();

    return redirect()->back();
  }

}
