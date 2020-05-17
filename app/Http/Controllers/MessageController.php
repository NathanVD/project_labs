<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use App\Mail\Contact_Preview;
use App\Message;
use App\Message_Confirmation_Mail;
use Mail;
use Alert;

class MessageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $messages = Message::all();

    return view('admin.inbox.index', compact('messages'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $message = new Message;

    $message->name = request('name');
    $message->email = request('email');
    $message->subject = request('subject');
    $message->message = request('message');

    $message->save();

    Mail::to($message->email)->send(new Contact($message));


    Alert::success('Message envoyé !')
      ->position('top-end')
      ->autoClose(2000)
      ->animation('animate__heartBeat', 'animate__fadeOut')
      ->timerProgressBar();

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $message = Message::find($id);

    $previous = Message::where('id', '<', $id)->max('id');
    $next = Message::where('id', '>', $id)->min('id');

    return view('admin.inbox.show', compact('message', 'previous', 'next'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Message::find($id)->delete();

    return redirect()->route('inbox.index');
  }

  /**
   * Réponses automatiques
   * 1) Envoi de message
   * 2) Abonnement à la newsletter
   * 3) Nouvel article
   */

  //  (1) Envoi de message
  // public function messageConfirmPreview()
  // {
  //   return (new Contact_Preview())->render();
  // }

  public function messageEmail()
  {
    $message = Message_Confirmation_Mail::find(1);

    return view('admin.inbox.message_email', compact('message'));
  }

  public function messageEmailUpdate(Request $request)
  {
    $message = Message_Confirmation_Mail::find(1);

    if (!$message) {
      $message = new Message_Confirmation_Mail;
    }

    $message->name = request('name');
    $message->email = request('email');
    $message->subject = request('subject');
    $message->message = request('message');

    $message->save();

    return redirect()->route('inbox.message_email');
  }

  // (2) Abonnement à la newsletter
    public function newsletterEmail()
  {
    $message = Message_Confirmation_Mail::find(1);

    return view('admin.inbox.newsletter_email', compact('message'));
  }

  public function newsletterEmailUpdate(Request $request)
  {
    $message = Message_Confirmation_Mail::find(1);

    if (!$message) {
      $message = new Message_Confirmation_Mail;
    }

    $message->name = request('name');
    $message->email = request('email');
    $message->subject = request('subject');
    $message->message = request('message');

    $message->save();

    return redirect()->route('inbox.newsletter_email');
  }

  // (3) Nouvel article
    public function blogPostEmail()
  {
    $message = Message_Confirmation_Mail::find(1);

    return view('admin.inbox.blogpost_email', compact('message'));
  }

  public function blogPostEmailUpdate(Request $request)
  {
    $message = Message_Confirmation_Mail::find(1);

    if (!$message) {
      $message = new Message_Confirmation_Mail;
    }

    $message->name = request('name');
    $message->email = request('email');
    $message->subject = request('subject');
    $message->message = request('message');

    $message->save();

    return redirect()->route('inbox.blogPost_email');
  }
}
