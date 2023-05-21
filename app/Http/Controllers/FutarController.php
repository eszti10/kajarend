<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\StatuszController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FutarController extends Controller
{



    public function index()
    {
        $db = DB::table('users')->select('*')->where('id', '=', Auth::id())->get();

            $dbh = DB::table('rendeleses')
            ->select('datum', 'users.name as nev', 'users.cim as cim', 'statuszs.statusznev as statusznev')
            ->join('users','rendeleses.felhasznaloID','=','users.id')
            ->join('statuszs','rendeleses.statuszID','=','statuszs.id')
            ->where('rendeleses.futarid','=', Auth::id())
            ->get();

            return view('/futarfelulet', compact('dbh'));

    }






}
