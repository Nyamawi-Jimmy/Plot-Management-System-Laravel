<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyUsers extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_users');    }
}
