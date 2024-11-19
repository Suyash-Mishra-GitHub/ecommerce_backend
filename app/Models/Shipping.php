<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'tracking_number', 'shipping_date', 'estimated_delivery_date', 'actual_delivery_date', 'shipping_status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

