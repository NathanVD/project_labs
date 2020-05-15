<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;
use App\Article;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request,$id)
    {
        $article = Article::find($id);

        $comment = new Comment;

        $comment->name = request('name');
        $comment->email = request('email');
        $comment->content = request('content');

        $article->comments()->save($comment);

        Alert::success('Super,', 'Commentaire envoyé !')
        // ->toToast('top-right')
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
        //
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
        $comment = Comment::find($id);

        $comment->delete();

        Alert::success('Commentaire supprimé','.')
        ->position('top-end')
        ->autoClose(2000)
        ->hideCloseButton()
        ->animation('animate__heartBeat','animate__fadeOut')
        ->timerProgressBar();

        return redirect()->back();
    }
}
