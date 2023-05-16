<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felhasznalo extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'felhnev',
        'jelszo',
        'email',
        'vnev',
        'knev',
        'cim',
        'jogosultsagID',
    ];
    protected $primaryKey='id';
}