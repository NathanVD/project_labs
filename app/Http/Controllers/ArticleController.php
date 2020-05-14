<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Article;
use App\Author;
use App\Category;
use App\Comment;
use App\Tag;
use App\Test;
use App\Article_Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.blog.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.blog.articles.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;

        $article->img_path = request('img')->store('img');
        $article->title = request('title');
        $article->author_id = Author::all()->shuffle()->first()->id;
        $article->category_id = request('category');
        $article->content = request('content');
        
        $article->save();

        $newtags = collect(request('tags'))->diff(Tag::all()->pluck('id'));
        $tags = Tag::find(request('tags'));

        foreach ($newtags as $newtag) {
            $tag = new Tag;
            $tag->name = $newtag;
            $tag->save();
            $tags->push($tag);
        }

        $article->tags()->attach($tags);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        $tags = Article::find($id)
        ->tags()
        ->inRandomOrder()
        ->limit(3)
        ->get()
        ->implode('name', ', ');

        return view('admin.blog.articles.show',compact('article','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.blog.articles.edit',compact('article','categories','tags'));
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
        $article = Article::find($id);

        if (request('img')) {
            Storage::delete($article->img_path);
            $article->img_path = request('img')->store('img');
        };
        $article->title = request('title');
        $article->category_id = request('category');
        $article->content = request('content');
        
        $article->save();

        // Tags supplémentaires
        // On retire tous les tags 
        $article->tags()->detach();
        // et on prend les nouveaux
        // Qui n'existent pas encore
        $newtags = collect(request('tags'))->diff(Tag::all()->pluck('id'));
        // Qui existent déjà
        $tags = Tag::find(request('tags'));

        foreach ($newtags as $newtag) {
            $tag = new Tag;
            $tag->name = $newtag;
            $tag->save();
            $tags->push($tag);
        }

        $article->tags()->attach($tags);


        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        Storage::delete($article->pic_path);

        $article->tags()->detach();

        $article->delete();

        return redirect()->route('articles.index');
    }

    /**
     * Approve an article (change article->approved between true and false)
     */
    public function approve($id)
    {
        $article = Article::find($id);

        $article->approved = !$article->approved;

        $article->save();

        return redirect()->back();
    }
}
