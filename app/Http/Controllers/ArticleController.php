<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Gate;

use App\Article;use App\Author;use App\Category;use App\Comment;
use App\Tag;use App\Test;use App\Article_Tag;use App\Newsletter;
use App\Mail\Blog_Post;
use Mail;
Use Alert;

class ArticleController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('webmaster-power')) {
            $articles = Article::all();
            return view('admin.blog.articles.index',compact('articles'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('writing-power')) {
            $categories = Category::all();
            $tags = Tag::all();

            return view('admin.blog.articles.create',compact('categories','tags'));
        } else {
            alert()->warning('Tu dois être rédacteur pour effectuer cette action');
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

        if (Gate::allows('writing-power')) {
            $article = new Article;

            $request->validate([
                'image'=>'required|image',
                'titre'=>'required|string',
                'catégorie'=>'required',
                'contenu'=>'required',
                'tags'=>'required|unique:tags,name',
            ]);

            $article->img_path = request('image')->store('img');
            $article->title = request('titre');
            $article->user_id = Auth::user()->id;
            $article->category_id = request('catégorie');
            $article->content = request('contenu');
            
            $article->save();

            $newtags = collect(request('tags'))->whereNotNull()->diff(Tag::all()->pluck('id'));

            $tags = Tag::find(request('tags'));

            foreach ($newtags as $newtag) {
                $tag = new Tag;
                $tag->name = $newtag;
                $tag->save();
                $tags->push($tag);
            }

            $article->tags()->attach($tags);

            alert()->toast('Article enregistrée !','success')->width('20rem');


            if (Gate::allows('webmaster-power')) {
                return redirect()->route('articles.index');            
            } else {
	            return redirect()->route('blog');
            }
            return redirect()->route('articles.index');            
        } else {
            alert()->warning('Tu dois être rédacteur pour effectuer cette action');
            return redirect()->back();            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('webmaster-power')) {
            $article = Article::find($id);

            $tags = Article::find($id)
            ->tags()
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->implode('name', ', ');

            return view('admin.blog.articles.show',compact('article','tags'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('webmaster-power')) {
            $article = Article::find($id);
            $categories = Category::all();
            $tags = Tag::all();

            return view('admin.blog.articles.edit',compact('article','categories','tags'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
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
        if (Gate::allows('webmaster-power')) {
            $article = Article::find($id);


            $request->validate([
                'titre'=>'required|string',
                'catégorie'=>'required',
                'contenu'=>'required',
                'tags'=>'required|unique:tags,name',
            ]);

            if (request('img')) {
                $request->validate(['image'=>'required|image',]);
                Storage::delete($article->img_path);
                $article->img_path = request('image')->store('img');
            };
            $article->title = request('titre');
            $article->category_id = request('catégorie');
            $article->content = request('contenu');
            
            $article->save();

            // Tags supplémentaires
            // On prend les nouveaux
            // Qui n'existent pas encore
            $newtags = collect(request('tags'))->whereNotNull()->diff(Tag::all()->pluck('id'));
            // Qui existent déjà
            $tags = Tag::find(request('tags'));

            foreach ($newtags as $newtag) {
                $tag = new Tag;
                $tag->name = $newtag;
                $tag->save();
                $tags->push($tag);
            }

            $article->tags()->sync($tags);

            alert()->toast('Article modifié !','success')->width('20rem');

            
            return redirect()->route('articles.index');            
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
        if (Gate::allows('webmaster-power')) {
            $article = Article::find($id);

            Storage::delete($article->pic_path);

            $article->tags()->detach();

            $article->delete();

            alert()->toast('Article supprimé !','error')->width('20rem');

            return redirect()->route('articles.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	    return redirect()->back();
        }
    }

    /**
     * Approve an article (change article->approved between true and false)
     */
    public function approve($id)
    {
        if (Gate::allows('webmaster-power')) {
            $article = Article::find($id);

            $article->approved = !$article->approved;

            if ($article->approved) {
                alert()->toast('Article approuvé !','warning')->width('20rem');
                $subscribers = Newsletter::all()->pluck('email')->toArray();
                // foreach ($subscribers as $subscriber) {
                //     Mail::to($subscriber->email)->send(new Blog_Post($article));
                // }
                Mail::to($subscribers)->send(new Blog_Post($article));
            } else {
                alert()->toast('Article retiré.','warning')->width('20rem');
            }

            $article->save();
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
        }
        return redirect()->back();
    }

    /**
     * Affiche les commentaires d'un article
     */
    public function comments($id)
    {
        if (Gate::allows('webmaster-power')) {
            $article = Article::find($id);

            return view('admin.blog.articles.comments',compact('article'));  
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
    }
}
