<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['coupon_code', 'discount_percentage', 'valid_from', 'valid_until', 'min_order_value', 'is_active'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_coupon_redemptions');
    }
}

