<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'refno',
        'status',
        'reason',
        'billcode',
        'amount',
        'transaction_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kad()
    {
        return $this->hasOne(Kad::class, 'order_id', 'order_id'); // 'order_id' is foreign key
    }

}
