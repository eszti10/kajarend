<?php

namespace App\Http\Controllers;
use App\Models\Rendelestetel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KosarController extends Controller
{
    public function index(Rendelestetel $rendelestetel)
    {

        $total=0;

        $jelenjog=DB::table('users')
        ->select('jogosultsags.jognev')
        ->join('jogosultsags','users.jogosultsagID','=','jogosultsags.ID')
        ->where('users.id','=',auth()->id())
        ->get();

        if ($jelenjog[0]->jognev=="admin"){
            $rendelestetels=DB::table('rendelestetels')
        ->select('rendelesID', 'etels.nev as enev', 'darab', 'etterems.nev as etnev', 'users.name as unev')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->join('rendeleses','rendelestetels.rendelesID','=','rendeleses.id')
        ->join('users','rendeleses.felhasznaloID','=','users.id')
        ->join('etterems','etels.etteremID','=','etterems.id')
        ->where('rendelesID','=',$rendelestetel->id)
        ->get();
        }else if($jelenjog[0]->jognev=="tulaj"){
            $rendelestetels=DB::table('rendelestetels')
        ->select('rendelesID', 'etels.nev as enev', 'darab', 'etterems.nev as etnev', 'users.name as unev')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->join('rendeleses','rendelestetels.rendelesID','=','rendeleses.id')
        ->join('users','rendeleses.felhasznaloID','=','users.id')
        ->join('etterems','etels.etteremID','=','etterems.id')
        ->where('rendelesID','=',$rendelestetel->id)
        ->where('etterems.tulajID','=',auth()->id())
        ->get();
        }else{
            $rendelestetels=DB::table('rendelestetels')
        ->select('rendelesID', 'etels.nev as enev', 'darab', 'etterems.nev as etnev', 'users.name as unev')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->join('rendeleses','rendelestetels.rendelesID','=','rendeleses.id')
        ->join('users','rendeleses.felhasznaloID','=','users.id')
        ->join('etterems','etels.etteremID','=','etterems.id')
        ->where('rendelesID','=',4)
        ->get();

            $total=DB::table('rendeleses')
        ->select('rendelesID', DB::raw('SUM(rendelestetels.darab * etels.ar) as tot'))
        ->join('rendelestetels','rendeleses.id','=','rendelestetels.rendelesID')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->where('rendelesID','=',4)
        ->groupBy('rendeleses.id')
        ->get();

        }

        return view('kosar',compact('rendelestetels','rendelestetel','jelenjog','total'));
    }
}
