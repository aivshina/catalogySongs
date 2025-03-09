<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name'
    ];

    public  function singerSong(){
        return $this->hasMany(SingerSong::class, 'song_id', 'id');
    }
}
