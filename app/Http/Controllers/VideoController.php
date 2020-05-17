<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Video;

class VideoController extends Controller
{
    public function edit() {

        $video = Video::find(1);

        return view('admin.video',compact('video'));
    }

    public function update(Request $request) {

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
    }
}
