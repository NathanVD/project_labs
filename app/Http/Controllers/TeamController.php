<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team_Title;
use App\Team;
use App\Starred;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_title = Team_Title::find(1);
        $team = Team::all();
        $starred = Starred::find(1);

        return view('admin.team.index', compact('team_title','team','starred'));
    }

    /*
    / Partie Titre
    */
    public function titleUpdate() {

        $title = Team_Title::find(1);

        if (!$title) {
            $title = new Team_Title;
        }

        $title->title_1 = request('title_1');
        $title->highlight = request('highlight');
        $title->title_2 = request('title_2');

        $title->save();

        return redirect()->route('team.index');
    }
    /*
    /Fin partie Titre
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new Team;

        $testimonial->pic_path = request('picture')->store('img');
        $testimonial->first_name = request('first_name');
        $testimonial->last_name = request('last_name');
        $testimonial->role = request('role');

        $testimonial->save();

        return redirect()->route('team.index');
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
        $team = Team::find($id);

        return view('admin.team.edit',compact('team'));
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
        $team = Team::find($id);
        
        $starred = Starred::find(1);
        if (request('picture')) {
            Storage::delete($team->pic_path);
            $team->pic_path = request('picture')->store('img');
        };
        $team->first_name = request('first_name');
        $team->last_name = request('last_name');
        $team->role = request('role');

        if ($starred && $team->id === $starred->member_id) {
            $starred->pic_path = $team->pic_path;
            $starred->first_name = $team->first_name;
            $starred->last_name = $team->last_name;
            $starred->role = $team->role;

            $starred->save();
        };

        $team->save();

        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $starred = Starred::find(1);

        Storage::delete($team->pic_path);

        if ($starred && $team->id === $starred->member_id) {
            $starred->delete();
        }

        $team->delete();

        return redirect()->route('team.index');
    }

    public function starredUpdate($id)
    {
        $team = Team::find($id);
        $starred = Starred::find(1);

        if (!$starred) {
            $starred = new Starred;
            $starred->id = 1;
        }


        $starred->pic_path = $team->pic_path;
        $starred->first_name = $team->first_name;
        $starred->last_name = $team->last_name;
        $starred->role = $team->role;
        $starred->member_id = $team->id;

        $starred->save();

        return redirect()->route('team.index');
    }

    public function starredRemove()
    {
        $starred = Starred::find(1);

        $starred->delete();

        return redirect()->route('team.index');
    }
}
