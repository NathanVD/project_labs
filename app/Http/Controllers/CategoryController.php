<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
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
        if (Gate::allows('webmaster-power')) {
            $categories = Category::all();
            $tags = Tag::all();

            return view('admin.blog.categories.index', compact('categories','tags'));            
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
        if (Gate::allows('webmaster-power')) {
            $category = new Category;

            $request->validate([
                'nom'=>'required|unique:categories,name|string',
            ]);

            $category->name = request('nom');
            
            $category->save();


            alert()->toast('Catégorie ajoutée !','success')->width('20rem');

            return redirect()->back();            
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
        $category = Category::find($id);

        return view('admin.blog.categories.edit',compact('category'));            
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
            $category = Category::find($id);

            $request->validate([
                'nom'=>'required|unique:categories,name|string',
            ]);

            $category->name = request('nom');
            
            $category->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('categories.index');            
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
            $cat = Category::find($id);

            $cat->delete();

            alert()->toast('Catégorie supprimée !','error')->width('20rem');

            return redirect()->route('categories.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    /**
     * Remove the specified tag.
     */
    public function rmTag($id)
    {
        if (Gate::allows('webmaster-power')) {
            $tag = Tag::find($id);

            $tag->articles()->detach();

            $tag->delete();

            alert()->toast('Tag supprimé !','error')->width('20rem');

            return redirect()->route('categories.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }
 
    }
}
