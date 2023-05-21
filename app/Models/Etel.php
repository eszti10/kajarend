<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etel extends Model
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

    protected $fillable=[
        'nev',
        'ar',
        'etteremID',
        'kategoriaID'
    ];

}
