<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingerSong extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'song_id', 'singer_id'
    ];

    public  function song(){
        return $this->hasOne(Song::class, 'id', 'song_id');
    }

    public  function singer(){
        return $this->hasOne(Singer::class, 'id', 'singer_id');
    }
}
