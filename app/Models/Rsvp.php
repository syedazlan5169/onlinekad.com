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

    public function scopeSearch($query, $term)
    {
        if ($term)
        {
            return $query->where('nama', 'LIKE', '%' . $term . '%');
        }

        return $query;
    }


    public function kad()
    {
        return $this->belongsTo(Kad::class);
    }
}
