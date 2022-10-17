<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public static function index(){
        return view('login');
    }
    public function valide(Request $req){
        session(['admin'=>'admin']);
        session(['nomAdmin'=>'sedra']);
        return ControllerListeIncident::index();
    }
    public function deconnexion(){
        session()->forget('admin');
        session()->forget('nomAdmin');
        return $this->index();
    }
}