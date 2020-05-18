<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Services_Title;
use Illuminate\Support\Facades\Auth;
use Gate;

class ServiceController extends Controller
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
            $title = Services_Title::find(1);
            $services = Service::all();

            return view('admin.services.index', compact('services','title'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    /*
    / Partie Titre
    */
    public function titleUpdate(Request $request) {
        if (Gate::allows('webmaster-power')) {
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
        if (Gate::allows('webmaster-power')) {
            return view('admin.services.create');           
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
            $service = Service::find($id);

            return view('admin.services.edit',compact('service'));            
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
            $service = Service::find($id);

            $service->delete();

            alert()->toast('Service supprimé !','error')->width('20rem');

            return redirect()->route('services.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
