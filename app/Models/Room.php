<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Room extends Model
{
    use HasFactory;
    protected $fillable=[
        "room_id" ,
        "name" ,
        "block",
        "category",
        "rent" ,
        "deposit",
    ];

    public function blocks(){
        return $this->belongsTo(Blocks::class);
    }
}
