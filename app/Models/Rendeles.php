<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendeles extends Model
{
    public $table = "rendeleses";
    use HasFactory;
    public function rendelestetels()
    {
        return $this->hasMany(Rendelestetels::class);
    }

    public function felhasznalos()
    {
        return $this->belongsTo(Felhasznalos::class);
    }

    protected $fillable=[
        'megjegyzés',
        'datum',
        'felhasznaloID',
        'statuszID',
        'fizetesmodID',
        'futarID'
    ];
}
