<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Felhasznalos;
use Illuminate\Support\Facades\Crypt;

class FelhasznalosController extends Controller
{
    public function authenticate(Request $request)
    {
        $felhnev = $request->post("username");
        $jelszo = $request->post("password");




            $prefix = '$2y$';
            $cost = '10';
            $salt = '$aztakurvaeletbehogyazistenit$';
            $blowFishPrefix = $prefix.$cost.$salt;
            $password = $jelszo;
            $hash = crypt( $password, $blowFishPrefix);



               $user=Felhasznalos::where([
                'felhnev' =>$felhnev,
                'jelszo'=>$hash,
               ])->first();
              //dd($hash,$jelszo);

               if($user)
               {
                   Auth::guard('felhasznalo')->login($user);
                   return redirect('valaszto');
               }else {

                    return redirect('/login')->with('hibakod', 2);
                }


    }
}
