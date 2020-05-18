<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Video;
use Illuminate\Support\Facades\Auth;
use Gate;

class VideoController extends Controller
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
    
    public function edit() {
        if (Gate::allows('webmaster-power')) {
            $video = Video::find(1);

            return view('admin.video',compact('video'));            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }

    public function update(Request $request) {
        if (Gate::allows('webmaster-power')) {
            $video = Video::find(1);

            $request->validate([
                'vidéo'=>'required|url',
            ]);

            if (!$video) {
                $video = new Video;
                $video->img_path = 'img/video.jpg';
            }

            if (request('miniature')) {
                $request->validate([
                    'miniature'=>'required|image',
                ]);
                Storage::delete($video->img_path);
                $video->img_path = request('miniature')->store('img');
            }

            $video->video_link = request('vidéo');

            $video->save();

            alert()->toast('Modification enregistrée !','success')->width('20rem');

            return redirect()->route('video');            
        } else {
            alert()->warning('Tu dois être webmaster pour effectuer cette action');
	        return redirect()->back();
        }

    }
}
