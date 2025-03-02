<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    use HasFactory;

    protected $fillable = [
        'font_url',
    ];

    public function kads()
    {
        return $this->hasMany(Kad::class);
    }
}
