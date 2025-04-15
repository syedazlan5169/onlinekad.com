<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kad extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'nombor_telefon' => 'array',
        'aturcara_majlis' => 'array',
        'tarikh_majlis' => 'date',
        'masa_mula_majlis' => 'string',
        'masa_tamat_majlis' => 'string',
    ];

    public function scopeSearch($query, $term)
    {
        if ($term)
        {
            return $query->where('nama', 'LIKE', '%' . $term . '%')
                        ->orWhere('is_paid', 'LIKE', '%' . $term . '%')
                        ->orWhere('design_id', 'LIKE', '%' . $term . '%')
                        ->orWhere('package_id', 'LIKE', '%' . $term . '%');
        }
    }

    public function  kad()
    {
        return $this->hasMany(Payment::class, 'order_id', 'order_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');  // Custom foreign key and local key
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function font()
    {
        return $this->belongsTo(Font::class);
    }

    public function bgsong()
    {
        return $this->belongsTo(BgSong::class);
    }

    public function guestbooks()
    {
        return $this->hasMany(Guestbook::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function rsvp()
    {
        return $this->hasMany(Rsvp::class);
    }
}
