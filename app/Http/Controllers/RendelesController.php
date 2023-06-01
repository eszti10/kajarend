<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rendeles;
use Illuminate\Support\Facades\DB;

class RendelesController extends Controller
{
    public function index()
    {

        $jelenjog=DB::table('users')
        ->select('jogosultsags.jognev')
        ->join('jogosultsags','users.jogosultsagID','=','jogosultsags.ID')
        ->where('users.id','=',auth()->id())
        ->get();

        if ($jelenjog[0]->jognev=="admin"){
            $rendeleses =DB::table('rendeleses')
        ->select('fizetesmods.fizetestipus as ftip','rendeleses.id as rid','datum', 'users.name', 'statuszs.statusznev', DB::raw('SUM(rendelestetels.darab * etels.ar) as total'),'megjegyzés')
        ->join('users','rendeleses.felhasznaloID','=','users.ID')
        ->join('statuszs','rendeleses.statuszID','=','statuszs.id')
        ->join('rendelestetels','rendeleses.id','=','rendelestetels.rendelesID')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->join('fizetesmods','fizetesmods.id','=','rendeleses.fizetesmodID')
        ->groupBy('rendeleses.id')
        ->get();

        $futars=DB::table('rendeleses')
        ->select('rendeleses.id', 'users.name')
        ->join('users','users.ID','=','rendeleses.futarID')
        ->where('users.name','!=','admin')
        ->orderBy('rendeleses.id','asc')
        ->get();
        }else if($jelenjog[0]->jognev=="tulaj"){
            $rendeleses =DB::table('rendeleses')
        ->select('fizetesmods.fizetestipus as ftip','rendeleses.id as rid','datum', 'users.name', 'statuszs.statusznev', DB::raw('SUM(rendelestetels.darab * etels.ar) as total'),'megjegyzés')
        ->join('users','rendeleses.felhasznaloID','=','users.ID')
        ->join('statuszs','rendeleses.statuszID','=','statuszs.id')
        ->join('rendelestetels','rendeleses.id','=','rendelestetels.rendelesID')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->join('etterems','etels.etteremID','=','etterems.id')
        ->join('fizetesmods','fizetesmods.id','=','rendeleses.fizetesmodID')
        ->where('etterems.tulajID','=',auth()->id())
        ->groupBy('rendeleses.id')
        ->get();

        $futars=DB::table('rendeleses')
        ->select('rendeleses.id', 'users.name')
        ->join('users','users.ID','=','rendeleses.futarID')
        ->where('users.name','!=','admin')
        ->orderBy('rendeleses.id','asc')
        ->get();
        }else{
            $rendeleses =DB::table('rendeleses')
        ->select('fizetesmods.fizetestipus as ftip','rendeleses.id as rid','datum', 'users.name', 'statuszs.statusznev', DB::raw('SUM(rendelestetels.darab * etels.ar) as total'),'megjegyzés')
        ->join('users','rendeleses.felhasznaloID','=','users.ID')
        ->join('statuszs','rendeleses.statuszID','=','statuszs.id')
        ->join('rendelestetels','rendeleses.id','=','rendelestetels.rendelesID')
        ->join('etels','rendelestetels.etelID','=','etels.id')
        ->join('etterems','etels.etteremID','=','etterems.id')
        ->join('fizetesmods','fizetesmods.id','=','rendeleses.fizetesmodID')
        ->where('rendeleses.felhasznaloID','=',auth()->id())
        ->groupBy('rendeleses.id')
        ->get();

        $futars=DB::table('rendeleses')
        ->select('rendeleses.id', 'users.name')
        ->join('users','users.ID','=','rendeleses.futarID')
        ->where('users.name','!=','admin')
        ->orderBy('rendeleses.id','asc')
        ->get();
        }

        return view('rendeleslista',compact('rendeleses'),compact('futars'));
    }

    public function store()
    {
        Rendeles::create([
            'megjegyzés'=>"",
            'datum'=>now(),
            'felhasznaloID'=>auth()->id(),
            'statuszID'=>1,
            'fizetesmodID'=>request('fizetesmodID'),
            'futarID'=>5
        ]);

        $id=DB::table('rendeleses')
        ->select('id')
        ->orderBy('id','desc')
        ->limit(1)
        ->get();

        DB::table('rendelestetels')
            ->where('rendelesID', 4)
            ->update(['rendelesID' => $id[0]->id]);

        return redirect('/etels');
    }
}
