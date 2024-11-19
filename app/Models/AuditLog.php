<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = ['action_type', 'table_name', 'record_id', 'changed_by', 'change_details'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'changed_by');
    }
}

