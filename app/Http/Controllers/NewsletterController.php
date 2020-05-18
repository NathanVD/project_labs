<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Newsletter as Newsletter_mail;
use App\Newsletter;
use Mail;
use Alert;
use Illuminate\Support\Facades\Auth;
use Gate;

class NewsletterController extends Controller
{

  public function subscribers()
  {
    if (Gate::allows('webmaster-power')) {
      $subscribers = Newsletter::all();

      return view('admin.blog.subscribers', compact('subscribers'));        
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
      return redirect()->back();
    }

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
    if (Gate::allows('webmaster-power')) {
      Newsletter::where('email',$email)->delete();

      return redirect()->back();        
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
      return redirect()->back();
    }

  }

}
