<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EtelController extends Controller
{
    public function index()
    {

        $nev = request('nev');
        $kanev = request('kanev');
        $etnev = request('etnev');
        $ar1 = request('ar1');
        $ar2 = request('ar2');

        $ar1bool=false;
        $ar2bool=false;

        if(is_null($ar1)){
            $ar1=0;
            $ar1bool=true;
        }

        if(is_null($ar2)){
            $ar2=10000000;
            $ar2bool=true;
        }

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
            ->where('etels.nev','like','%'.$nev.'%')
            ->where('kategorias.nev','like','%'.$kanev.'%')
            ->where('etterems.nev','like','%'.$etnev.'%')
            ->where('ar','>=',$ar1)
            ->where('ar','<=',$ar2)
            ->get();
        }else if($jelenjog[0]->jognev=="tulaj"){
            $etels=DB::table('etels')
            ->select('etels.id','etels.nev as enev', 'ar', 'kategorias.nev as kanev', 'etterems.nev as etnev')
            ->join('kategorias','etels.kategoriaID','=','kategorias.ID')
            ->join('etterems','etels.etteremID','=','etterems.id')
            ->where('etterems.tulajID','=',auth()->id())
            ->where('etels.nev','like','%'.$nev.'%')
            ->where('kategorias.nev','like','%'.$kanev.'%')
            ->where('etterems.nev','like','%'.$etnev.'%')
            ->where('ar','>=',$ar1)
            ->where('ar','<=',$ar2)
            ->get();
        }else{
            $etels=DB::table('etels')
            ->select('etels.id', 'etels.nev as enev', 'ar', 'kategorias.nev as kanev', 'etterems.nev as etnev')
            ->join('kategorias','etels.kategoriaID','=','kategorias.ID')
            ->join('etterems','etels.etteremID','=','etterems.id')
            ->where('etels.nev','like','%'.$nev.'%')
            ->where('kategorias.nev','like','%'.$kanev.'%')
            ->where('etterems.nev','like','%'.$etnev.'%')
            ->where('ar','>=',$ar1)
            ->where('ar','<=',$ar2)
            ->get();
        }

        $jelenjog=DB::table('users')
        ->select('jogosultsags.jognev')
        ->join('jogosultsags','users.jogosultsagID','=','jogosultsags.ID')
        ->where('users.id','=',auth()->id())
        ->get();

        if($ar1bool){
            $ar1=null;
        }

        if($ar2bool){
            $ar2=null;
        }

        return view('etels.index',compact('etels','jelenjog','nev','kanev','etnev','ar1','ar2'));
    }

    public function show(Etel $etel)
    {
        $db=1;

        $etels=DB::table('etels')
            ->select('etels.id', 'etels.nev as enev', 'ar', 'kategorias.nev as kanev', 'etterems.nev as etnev')
            ->join('kategorias','etels.kategoriaID','=','kategorias.ID')
            ->join('etterems','etels.etteremID','=','etterems.id')
            ->where('etels.id','=',$etel->id)
            ->get();

        return view('etels.show', compact('etels','db'));
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
