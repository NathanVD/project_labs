<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
Use Alert;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request,$id)
    {
        if (Auth::check()) {

            $article = Article::find($id);

            $comment = new Comment;

            $request->validate([
                'nom'=>'required|string',
                'email'=>'required|email',
                'contenu'=>'required',
            ]);

            $comment->name = request('nom');
            $comment->email = request('email');
            $comment->content = request('contenu');
            $comment->img_path = Auth::user()->photo_path;
            $article->comments()->save($comment);

            Alert::success('Commentaire envoyé !')
            ->position('top-end')
            ->autoClose(2000)
            ->animation('animate__heartBeat','animate__fadeOut')
            ->timerProgressBar();

        } else {
            alert()->error('Tu dois être connecté pour commenter !');
        }

        return redirect()->back();
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

        Alert::success('Commentaire supprimé.')
        ->position('top-end')
        ->autoClose(2000)
        ->hideCloseButton()
        ->animation('animate__heartBeat','animate__fadeOut')
        ->timerProgressBar();

        return redirect()->back();
    }
}
