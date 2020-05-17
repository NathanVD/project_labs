<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
Use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.blog.categories.index', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;

        $request->validate([
            'nom'=>'required|unique:categories,name|string',
        ]);

        $category->name = request('nom');
        
        $category->save();


        alert()->toast('Catégorie ajoutée !','success')->width('20rem');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.blog.categories.edit',compact('category'));
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
        $category = Category::find($id);

        $request->validate([
            'nom'=>'required|unique:categories,name|string',
        ]);

        $category->name = request('nom');
        
        $category->save();

        alert()->toast('Modification enregistrée !','success')->width('20rem');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);

        $cat->delete();

        alert()->toast('Catégorie supprimée !','error')->width('20rem');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified tag.
     */
    public function rmTag($id)
    {
        $tag = Tag::find($id);

        $tag->articles()->detach();

        $tag->delete();

        alert()->toast('Tag supprimé !','error')->width('20rem');

        return redirect()->route('categories.index');
    }
}
