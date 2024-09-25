<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kad extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'is_paid',
        'user_id',
        'design_id',
        'font_id',
        'package_id',
        'tajuk_kad',
        'nama_penuh_lelaki',
        'nama_penuh_perempuan',
        'nama_panggilan_lelaki',
        'nama_panggilan_perempuan',
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
        'nombor_telefon',
        'aturcara_majlis',
    ];

    protected $casts = [
        'nombor_telefon' => 'array',
        'aturcara_majlis' => 'array',
        'tarikh_majlis' => 'date',
        'masa_mula_majlis' => 'string',
        'masa_tamat_majlis' => 'string',
    ];

        // Modify the order relationship to reference 'order_id' instead of 'id'
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
    
        public function font()
        {
            return $this->belongsTo(Font::class);
        }
    
        public function guestbooks()
        {
            return $this->hasMany(Guestbook::class);
        }
    
        public function rsvp()
        {
            return $this->hasMany(Rsvp::class);
        }
}
