<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorias extends Model
{
    use HasFactory;
    public function etels()
    {
        return $this->belongsTo(Etels::class);
    }
}
