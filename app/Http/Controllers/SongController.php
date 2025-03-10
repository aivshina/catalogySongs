<?php

namespace App\Http\Controllers;

use App\Models\SingerSong;
use App\Models\Song;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(){
        $songs = Song::with('singerSong','singerSong.singer')->get();

        return $songs;
    }

    public function store(Request $request){

        $song = new Song();
        $song->name = $request->get('name');
        $song->save();

        foreach ($request->get('singer_ids') as $singer_id){
            $singerSong = new SingerSong();
            $singerSong->song_id = $song->id;
            $singerSong->singer_id = $singer_id;
            $singerSong->save();
        };

        $response = [
            'status' => true,
        ];

        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
