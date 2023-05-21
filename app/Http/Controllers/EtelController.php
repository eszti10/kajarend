<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etel;
use Illuminate\Support\Facades\DB;

class EtelController extends Controller
{
    public function index()
    {
        $jelenjog=DB::table('users')
        ->select('jogosultsags.jognev')
        ->join('jogosultsags','users.jogosultsagID','=','jogosultsags.ID')
        ->where('users.id','=',auth()->id())
        ->get();

        if ($jelenjog[0]->jognev=="admin"){
            $etels=DB::table('etels')
            ->select('etels.id', 'etels.nev as enev', 'ar', 'kategorias.nev as kanev', 'etterems.nev as etnev')
            ->join('kategorias','etels.kategoriaID','=','kategorias.ID')
            ->join('etterems','etels.etteremID','=','etterems.id')
            ->get();
        }else if($jelenjog[0]->jognev=="tulaj"){
            $etels=DB::table('etels')
            ->select('etels.id','etels.nev as enev', 'ar', 'kategorias.nev as kanev', 'etterems.nev as etnev')
            ->join('kategorias','etels.kategoriaID','=','kategorias.ID')
            ->join('etterems','etels.etteremID','=','etterems.id')
            ->where('etterems.tulajID','=',auth()->id())
            ->get();
        }else{
            $etels=$jelenjog;
        }




        return view('etels.index',compact('etels'));
    }

    public function edit(Etel $etel)
    {
        $kanev=DB::table('etels')
        ->select('kategorias.nev')
        ->join('kategorias','etels.kategoriaID','=','kategorias.id')
        ->where('etels.id','=',$etel->id)
        ->get();

        $etnev=DB::table('etels')
        ->select('etterems.nev')
        ->join('etterems','etels.etteremID','=','etterems.id')
        ->where('etels.id','=',$etel->id)
        ->get();

        $etterems=DB::table('etterems')
        ->select('etterems.nev')
        ->get();

        $jelenjog=DB::table('users')
        ->select('jogosultsags.jognev')
        ->join('jogosultsags','users.jogosultsagID','=','jogosultsags.ID')
        ->where('users.id','=',auth()->id())
        ->get();

        return view('etels.edit', compact('etel','kanev','etnev','etterems','jelenjog'));
    }

    public function update(Etel $etel)
    {
        $etel->update([
            'nev'=>request('nev'),
            'ar'=>request('ar'),
            'kategoriaID'=>request('kategoriaID'),
            'etteremID'=>request('etteremID')
        ]);
        return redirect('/etels');
    }

    public function destroy(Etel $etel)
        {
            $etel->delete();
            return redirect('/etels');
        }

    public function create()
    {

        $jelenjog=DB::table('users')
        ->select('jogosultsags.jognev')
        ->join('jogosultsags','users.jogosultsagID','=','jogosultsags.ID')
        ->where('users.id','=',auth()->id())
        ->get();

        if ($jelenjog[0]->jognev=="admin"){
            $etterems=DB::table('etterems')
            ->select('etterems.id','etterems.nev')
            ->get();
        }else{
            $etterems=DB::table('etterems')
            ->select('etterems.id','etterems.nev')
            ->where('tulajID','=',auth()->id())
            ->get();
        }

        return view('etels.create', compact('etterems','jelenjog'));
    }

    public function store()
    {
        Etel::create([
            'nev'=>request('nev'),
            'ar'=>request('ar'),
            'kategoriaID'=>request('kategoriaID'),
            'etteremID'=>request('etteremID')
        ]);
        return redirect('/etels');
    }
}
