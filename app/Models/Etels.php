<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etels extends Model
{
    use HasFactory;
    public function etterems()
    {
        return $this->belongsTo(Etterems::class);
    }

    public function rendelestetels()
    {
        return $this->hasMany(Rendelestetels::class);
    }
}
