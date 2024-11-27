<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'refno',
        'status',
        'reason',
        'billcode',
        'amount',
        'transaction_time',
    ];

    public function kad()
    {
        return $this->hasOne(Kad::class, 'order_id', 'order_id'); // 'order_id' is foreign key
    }
}
