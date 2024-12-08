<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kad extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'order_id',
        'is_paid',
        'user_id',
        'design_id',
        'font_id',
        'package_id',
        'bg_song_id',
        'tajuk_kad',
        'rsvp_is_on',
        'slider_image',
        'guestbook_is_on',
        'slideshow_is_on',
        'gift_is_on',
        'nama_penuh_lelaki',
        'nama_penuh_perempuan',
        'nama_panggilan_lelaki',
        'nama_panggilan_perempuan',
        'penjemput',
        'nama_bapa_pengantin',
        'nama_ibu_pengantin',
        'nama_bapa_pengantin_lelaki',
        'nama_ibu_pengantin_lelaki',
        'nama_bapa_pengantin_perempuan',
        'nama_ibu_pengantin_perempuan',
        'tarikh_majlis',
        'masa_mula_majlis',
        'masa_tamat_majlis',
        'alamat_majlis',
        'google_url',
        'waze_url',
        'google_calendar_url',
        'apple_calendar_url',
        'aturcara_majlis',
        'nombor_telefon',
        'ayat_jemputan',
        'doa_pengantin',
        'dua_pasangan_is_on',
        'nama_penuh_pasangan_pertama',
        'nama_penuh_pasangan_kedua',
        'nama_panggilan_pasangan_pertama',
        'nama_panggilan_pasangan_kedua',
        'account_number',
        'qr_image',
        'bank_name',
    ];

    protected $casts = [
        'nombor_telefon' => 'array',
        'aturcara_majlis' => 'array',
        'tarikh_majlis' => 'date',
        'masa_mula_majlis' => 'string',
        'masa_tamat_majlis' => 'string',
    ];

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
