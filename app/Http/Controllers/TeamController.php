<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Team_Title;
// use App\Team;
use App\User;
use App\Role;
use App\Starred;
use Illuminate\Support\Facades\Auth;
use Gate;

class TeamController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
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
            $team_title = Team_Title::find(1);
            $team = Role::where('name','Teammate')->first()->users()->get();
            $starred = Starred::find(1);

            return view('admin.team.index', compact('team_title','team','starred'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    /*
    / Partie Star
    */

    public function starredUpdate($id) {

        if (Gate::allows('webmaster-power')) {
            $team = User::find($id);
            $starred = Starred::find(1);

            if (!$starred) {
                $starred = new Starred;
                $starred->id = 1;
            }


            $starred->pic_path = $team->photo_path;
            $starred->name = $team->name;
            $starred->roles = $team->roles()->get()->implode('name', ', ');
            $starred->member_id = $team->id;

            $starred->save();

            alert()->toast('Vedette modifiée !','success')->width('20rem');

            return redirect()->route('team.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function starredRemove() {

        if (Gate::allows('webmaster-power')) {
            $starred = Starred::find(1);

            $starred->delete();

            alert()->toast('Vedette retirée !','warning')->width('20rem');

            return redirect()->route('team.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
    /*
    / Partie star
    */

    /*
    / Partie Titre
    */
    public function titleUpdate(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $title = Team_Title::find(1);

            $request->validate([
                'titre_1'=>'nullable|RequiredWithout:surlignement,titre_2|string',
                'surlignement'=>'nullable|RequiredWithout:titre_1,titre_2|string',
                'titre_2'=>'nullable|RequiredWithout:surlignement,titre_1|string',
            ]);

            if (!$title) {
                $title = new Team_Title;
            }

            $title->title_1 = request('titre_1');
            $title->highlight = request('surlignement');
            $title->title_2 = request('titre_2');

            $title->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('team.index');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
    /*
    /Fin partie Titre
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     if (Gate::allows('webmaster-power')) {
    //         return view('admin.team.create');            
    //     } else {
    //         alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//         return redirect()->back();
    //     }

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     if (Gate::allows('webmaster-power')) {
    //         $testimonial = new Team;

    //         $request->validate([
    //             'photo'=>'required|image',
    //             'prénom'=>'required|string',
    //             'nom'=>'required|string',
    //             'role'=>'required|string',
    //         ]);

    //         $testimonial->pic_path = request('photo')->store('img');
    //         $testimonial->first_name = request('prénom');
    //         $testimonial->last_name = request('nom');
    //         $testimonial->role = request('role');

    //         $testimonial->save();

    //         alert()->toast('Modification enregistrée !','success')->width('20rem');

    //         return redirect()->route('team.index');            
    //     } else {
    //         alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//         return redirect()->back();
    //     }

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     if (Gate::allows('webmaster-power')) {
    //         $team = Team::find($id);

    //         return view('admin.team.edit',compact('team'));            
    //     } else {
    //         alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//         return redirect()->back();
    //     }

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     if (Gate::allows('webmaster-power')) {
    //         $team = Team::find($id);
    //         $starred = Starred::find(1);

    //         $request->validate([
    //             'prénom'=>'required|string',
    //             'nom'=>'required|string',
    //             'role'=>'required|string',
    //         ]);

    //         if (request('photo')) {
    //             $request->validate([
    //                 'photo'=>'required|image',
    //             ]);
    //             Storage::delete($team->pic_path);
    //             $team->pic_path = request('photo')->store('img');
    //         };
    //         $team->first_name = request('prénom');
    //         $team->last_name = request('nom');
    //         $team->role = request('role');

    //         if ($starred && $team->id === $starred->member_id) {
    //             $starred->pic_path = $team->pic_path;
    //             $starred->first_name = $team->first_name;
    //             $starred->last_name = $team->last_name;
    //             $starred->role = $team->role;

    //             $starred->save();
    //         };

    //         $team->save();

    //         alert()->toast('Modification enregistrée !','success')->width('20rem');

    //         return redirect()->route('team.index');            
    //     } else {
    //         alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//     return redirect()->back();
    //     }

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     if (Gate::allows('webmaster-power')) {
    //         $team = Team::find($id);
    //         $starred = Starred::find(1);

    //         Storage::delete($team->pic_path);

    //         if ($starred && $team->id === $starred->member_id) {
    //             $starred->delete();
    //         }

    //         $team->delete();

    //         alert()->toast('Membre supprimé !','error')->width('20rem');

    //         return redirect()->route('team.index');            
    //     } else {
    //         alert()->warning('Tu dois être webmaster pour effectuer cette action');
	//         return redirect()->back();
    //     }

    // }


}
