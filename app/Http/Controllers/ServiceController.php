<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Services_Title;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = Services_Title::find(1);
        $services = Service::all();

        return view('admin.services.index', compact('services','title'));
    }

    /*
    / Partie Titre
    */
    public function titleUpdate(Request $request) {

        $title = Services_Title::find(1);

        $request->validate([
            'titre_1'=>'nullable|RequiredWithout:surlignement,titre_2|string',
            'surlignement'=>'nullable|RequiredWithout:titre_1,titre_2|string',
            'titre_2'=>'nullable|RequiredWithout:surlignement,titre_1|string',
        ]);

        if (!$title) {
            $title = new Services_Title;
        }

        $title->title_1 = request('titre_1');
        $title->highlight = request('surlignement');
        $title->title_2 = request('titre_2');

        $title->save();

        alert()->toast('Modification enregistrée !','success')->width('20rem');

        return redirect()->route('services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'icone'=>'required',
            'nom'=>'required|string',
            'description'=>'required|string',
        ]);

        $service = new Service;

        $service->icon = request('icone');
        $service->title = request('nom');
        $service->description = request('description');

        $service->save();

        alert()->toast('Service ajouté !','success')->width('20rem');

        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('admin.services.edit',compact('service'));
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
        $service = Service::find($id);

        $request->validate([
            'nom'=>'required|string',
            'description'=>'required|string',
        ]);

        if (request('icon')) {
            $request->validate([
        	    'icone'=>'required',
            ]);
            $service->icon = request('icon');
        }
        $service->title = request('nom');
        $service->description = request('description');

        $service->save();

        alert()->toast('Modification enregistrée !','success')->width('20rem');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        alert()->toast('Service supprimé !','error')->width('20rem');

        return redirect()->route('services.index');
    }
}
