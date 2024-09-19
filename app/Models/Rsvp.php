<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    use HasFactory;

    protected $fillable = [
        'kad_id',
        'nama',
        'nombor_telefon',
        'jumlah_kehadiran',
        'kehadiran',
    ];

    public function kad()
    {
        return $this->belongsTo(Kad::class);
    }
}
