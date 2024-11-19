<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'discount_percentage', 'discount_start_date', 'discount_end_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
