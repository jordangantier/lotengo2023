<?php

namespace App\Http\Controllers;

use App\Models\Boleto;

class BoletoController extends Controller
{
    public function index()
    {
        $boletos = Boleto::select('id AS serie')->where('habilitado', 1)->where('concurso', 3)->get();

        return $boletos;
    }
}
