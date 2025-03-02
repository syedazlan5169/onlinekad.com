<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'kad_id',
        'image_url_1',
        'image_url_2',
        'image_url_3',
        'image_url_4',
        'image_url_5',
    ];

    public function kad()
    {
        return $this->belongsTo(Kad::class);
    }
}
