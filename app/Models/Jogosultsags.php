<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogosultsags extends Model
{
    use HasFactory;
    public function felhasznalos()
    {
        return $this->belongsTo(Felhasznalos::class);
    }

}
