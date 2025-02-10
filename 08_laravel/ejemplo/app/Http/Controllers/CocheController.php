<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index () {
        $coches = [
            ["Mazda RX7","Mazda","30000€"],
            ["Mitshubishi Colt","Mitshubishi","20000€"],
            ["Fiat multipla","Fiat","50000€"]
        ];
        return view('coches', ['coches' => $coches]);
    }
}

?>
