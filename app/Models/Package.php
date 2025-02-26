<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Check for active promotions
    public function getHasActivePromotionAttribute()
    {
        $promotion = Promotion::active()->first();
        return $promotion && $this->price > 0;
    }
    

    // Accessor for final price
    public function getFinalPriceAttribute()
    {

        $basePrice = $this->price;
        if ($basePrice <= 0)
        {
            return $basePrice;
        }

        // Retrieve active promotions
        $promotions = Promotion::active()->first();

        if ($promotions)
        {
            if ($promotions->discount_type == 'fixed')
            {
                return max(0, $basePrice - $promotions->discount_amount);
            }
            elseif ($promotions->discount_type == 'percentage')
            {
                return max(0, $basePrice * (1 - $promotions->discount_amount / 100));
            }
        }

        return $basePrice;
    }

    public function kads()
    {
        return $this->hasMany(Kad::class);
    }
}
