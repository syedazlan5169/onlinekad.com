<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'design_code',
        'design_url',
        'category',
        'total_created',
    ];

    public function kads()
    {
        return $this->hasMany(Kad::class);
    }
}
