<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fizetesmod extends Model
{
    use HasFactory;
    public function rendeleses()
    {
        return $this->belongsTo(Rendeleses::class);
    }
}
