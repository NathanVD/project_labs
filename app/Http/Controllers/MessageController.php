<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
Use Alert;

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

        return view('admin.inbox.index',compact('messages'));
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

        Alert::success('Super,', 'Message envoyé !')
        ->position('top-end')
        ->autoClose(2000)
        ->hideCloseButton()
        ->animation('animate__heartBeat','animate__fadeOut')
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

        $previous = Message::where('id','<',$id)->max('id');
        $next = Message::where('id','>',$id)->min('id');

        return view('admin.inbox.show',compact('message','previous','next'));
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

        return redirect()->route('messages.index');
    }
}
