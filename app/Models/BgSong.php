<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BgSong extends Model
{
    use HasFactory;

    public function kads()
        {
            return $this->hasMany(Kad::class);
        }
}
