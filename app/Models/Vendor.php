<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'store_name', 'store_description', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

