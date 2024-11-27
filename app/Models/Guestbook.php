<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'kad_id',
        'author',
        'wish',
        'created_at',
    ];

    public function kad()
    {
        return $this->belongsTo(Kad::class);
    }
}
