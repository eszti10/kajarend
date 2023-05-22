<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendelestetel extends Model
{
    use HasFactory;
    public function rendeleses()
    {
        return $this->belongsToMany(Rendeleses::class);
    }

    public function etels()
    {
        return $this->belongsToMany(Etels::class);
    }

    protected $fillable=[
        'rendelesID',
        'etelID',
        'darab'
    ];
}
