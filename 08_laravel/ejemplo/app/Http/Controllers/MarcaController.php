<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index () {
        $marcas = [
            "Mazda",
            "Peugeot",
            "Toyota"
        ];

        return view('marcas', ['marcas' => $marcas]);
    }

}
