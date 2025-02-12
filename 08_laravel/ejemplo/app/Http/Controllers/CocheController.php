<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index () {
        $coches = [
            ["RX7","Mazda",30000],
            ["Colt","Mitsubishi",20000],
            ["multipla","Fiat",50000],
            ["307 MS","Peugeot",15000],
        ];
        return view('coches', ['coches' => $coches]);
    }
}

?>
