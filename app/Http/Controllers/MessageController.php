<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Mail\Contact;
use App\Mail\Contact_Preview;
use App\Mail\Newsletter;
use App\Mail\Blog_post;
use App\Message;use App\Message_Confirmation_Mail;use App\Newsletter_Mail;use App\Blog_Post_Mail;
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
    $this->middleware('auth');

    if (Gate::allows('webmaster-power')) {
      $messages = Message::all();

      return view('admin.inbox.index', compact('messages'));      
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
      return redirect()->back();
    }
 
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name'=>'required|string',
      'email'=>'required|email',
      'subject'=>'required|string',
      'message'=>'required'

    ]);
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
    $this->middleware('auth');

    if (Gate::allows('webmaster-power')) {
      $message = Message::find($id);

      $previous = Message::where('id', '<', $id)->max('id');
      $next = Message::where('id', '>', $id)->min('id');

      return view('admin.inbox.show', compact('message', 'previous', 'next'));            
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $this->middleware('auth');
    if (Gate::allows('webmaster-power')) {
      Message::find($id)->delete();

      return redirect()->route('inbox.index');            
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
    }

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
    if (Gate::allows('webmaster-power')) {
      $message = Message_Confirmation_Mail::find(1);

      return view('admin.inbox.message_email', compact('message'));          
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
      return redirect()->back();
    }

  }

  public function messageEmailUpdate(Request $request)
  {
    if (Gate::allows('webmaster-power')) {
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
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
      return redirect()->back();
    }

  }

  // (2) Abonnement à la newsletter
    public function newsletterEmail()
  {
    if (Gate::allows('webmaster-power')) {
      $message = Newsletter_Mail::find(1);

      return view('admin.inbox.newsletter_email', compact('message'));            
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
    }

  }

  public function newsletterEmailUpdate(Request $request)
  {
    if (Gate::allows('webmaster-power')) {
      $message = Newsletter_Mail::find(1);

      if (!$message) {
        $message = new Newsletter_Mail;
      }

      $message->name = request('name');
      $message->email = request('email');
      $message->subject = request('subject');
      $message->message = request('message');

      $message->save();

      return redirect()->route('inbox.newsletter_email');            
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
    }

  }

  // (3) Nouvel article
    public function blogPostEmail()
  {
    if (Gate::allows('webmaster-power')) {
      $message = Message_Confirmation_Mail::find(1);

      return view('admin.inbox.blogpost_email', compact('message'));            
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
    }

  }

  public function blogPostEmailUpdate(Request $request)
  {
    if (Gate::allows('webmaster-power')) {
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
    } else {
      alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
    }

  }

    // (4) Inscription
  //   public function Registe()
  // {
  //   if (Gate::allows('webmaster-power')) {
  //     $message = Message_Confirmation_Mail::find(1);

  //     return view('admin.inbox.blogpost_email', compact('message'));            
  //   } else {
  //     alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//     return redirect()->back();
  //   }

  // }

  // public function blogPostEmailUpdate(Request $request)
  // {
  //   if (Gate::allows('webmaster-power')) {
  //     $message = Message_Confirmation_Mail::find(1);

  //     if (!$message) {
  //       $message = new Message_Confirmation_Mail;
  //     }

  //     $message->name = request('name');
  //     $message->email = request('email');
  //     $message->subject = request('subject');
  //     $message->message = request('message');

  //     $message->save();

  //     return redirect()->route('inbox.blogPost_email');            
  //   } else {
  //     alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//     return redirect()->back();
  //   }

  // }
}
