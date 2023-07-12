<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boleto;

class JsonGeneratorController extends Controller
{
    public function index()
    {
        $json = Boleto::select('boletos.id', 'nombre', 'ci_nit', 'telefono', 'email', 'concurso', 'contador1', 'contador2', 'contador3', 'numeros')
            ->join('transaccions', 'transaccions.id', '=', 'boletos.id_transaccion')
            ->join('participantes', 'participantes.id', '=', 'transaccions.id_participante')
            ->where('boletos.habilitado', 1)
            ->where('concurso', 4)
            ->get();

        return response()->json($json);
    }
}
