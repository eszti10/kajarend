<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendeles extends Model
{
    use HasFactory;
    public function rendelestetels()
    {
        return $this->hasMany(Rendelestetels::class);
    }

    public function felhasznalos()
    {
        return $this->belongsTo(Felhasznalos::class);
    }
}
