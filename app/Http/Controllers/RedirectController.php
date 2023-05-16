<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function valaszto(){
        switch (Auth::user()->jogosultsagID) {
            case 1:
                return redirect('/vasarlofelulet');
                break;

                case 2:
                    return redirect('/ettermifelulet');
                    break;

                    case 3:
                        return redirect('/futarfelulet');
                        break;
            default:
                return redirect('/bejelentkezes')->with('hibakod', 3);
                break;
        }
    }
}
