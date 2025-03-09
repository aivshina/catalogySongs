<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function getAllSingers(){
        return Singer::with('genre')->get();
    }

    public function saveSinger (Request $request){

        $singer = new Singer();
        $singer->name = $request->get('name');
        $singer->genre_id = $request->get('genre_id');
        $singer->save();

        $response = [
            'status' => true,
        ];

        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
