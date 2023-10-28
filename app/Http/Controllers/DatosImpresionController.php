<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;

class DatosImpresionController extends Controller
{
    public function index()
    {
        $toPrint = Transaccion::select('transaccions.id as id_transaccion', 'users.name as usuario', 'nombre', 'ci_nit', 'telefono', 'participantes.email', 'transaccions.created_at as fecha', 'monto_acumulado', 'qty_boletos', 'habilitados')
            ->join('participantes', 'participantes.id', '=', 'transaccions.id_participante')
            ->join('users', 'users.id', '=', 'transaccions.id_user')
            ->orderBy('id_transaccion', 'DESC')
            ->get();

        return $toPrint;
    }

    public function show($id)
    {
        $toPrint = Transaccion::select('transaccions.id as id_transaccion', 'users.name as usuario', 'nombre', 'ci_nit', 'telefono', 'participantes.email', 'transaccions.created_at as fecha', 'monto_acumulado', 'qty_boletos', 'habilitados')
            ->join('participantes', 'participantes.id', '=', 'transaccions.id_participante')
            ->join('users', 'users.id', '=', 'transaccions.id_user')
            ->where('ci_nit', $id)
            ->orderBy('id_transaccion', 'DESC')
            ->first();

        return $toPrint;
    }

    public function print($id)
    {
        $toPrint = Transaccion::select('transaccions.id as id_transaccion', 'users.name as usuario', 'nombre', 'ci_nit', 'telefono', 'participantes.email', 'transaccions.created_at as fecha', 'monto_acumulado', 'qty_boletos', 'habilitados')
            ->join('participantes', 'participantes.id', '=', 'transaccions.id_participante')
            ->join('users', 'users.id', '=', 'transaccions.id_user')
            ->where('transaccions.id', $id)
            ->orderBy('id_transaccion', 'DESC')
            ->first();

        return view('imprimir', compact('toPrint'));
    }
}
