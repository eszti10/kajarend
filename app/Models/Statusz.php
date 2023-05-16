<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusz extends Model
{
    use HasFactory;
    public function rendeleses()
    {
        return $this->belongsTo(Rendeleses::class);
    }
}
