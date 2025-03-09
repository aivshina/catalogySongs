<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'genre_id'
    ];

    public function genre(){
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
}
