<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Transaccion;

use App\Models\Participante;

use App\Models\Boleto;

class TransaccionController extends Controller
{
    public function store(Request $request)
    {
        // Verifica si el participante es nuevo o si ya está registrado en la DB.
        if ($request['id_participante'] == "" || $request['id_participante'] == null) {
            // Si el participante es nuevo -->
            // Guarda un nuevo participante.
            $participante = new Participante();
            $participante['nombre'] = $request->nombre;
            $participante['ci_nit'] = $request->ci_nit;
            $participante['fecha_nac'] = $request->fecha_nac;
            $participante['telefono'] = $request->telefono;
            $participante['email'] = $request->email;
            $participante['created_at'] = Carbon::now();
            $participante->save();
            $id_part = Participante::first('id')->where('ci_nit', '=', $request->ci_nit)->get();

            // Guarda la transacción.
            $transaccion = new Transaccion();
            $transaccion['id_user'] = $request['id_user'];
            $transaccion['id_participante'] = $id_part[0]->id;
            $transaccion['monto_acumulado'] = $request['monto_acumulado'];
            $transaccion['qty_boletos'] = $request['qty_boletos'];
            $transaccion['facturas'] = $request['facturas'];
            $transaccion['habilitados'] = $request['habilitados'];
            $transaccion['created_at'] = Carbon::now();
            $transaccion->save();
            $transaccion->id;

            // Habilita los boletos en la DB.
            $array = json_decode($transaccion['habilitados']);
            foreach ($array as $value) {
                $habilitar = Boleto::find($value);
                $habilitar->id_transaccion = $transaccion->id;
                $habilitar->habilitado = 0;
                $habilitar->update();
            }
        } else {
            // Si el participante ya está registrado en la DB. -->
            //Guarda la transacción.
            $transaccion = new Transaccion();
            $transaccion['id_user'] = $request['id_user'];
            $transaccion['id_participante'] = $request['id_participante'];
            $transaccion['monto_acumulado'] = $request['monto_acumulado'];
            $transaccion['qty_boletos'] = $request['qty_boletos'];
            $transaccion['facturas'] = $request['facturas'];
            $transaccion['habilitados'] = $request['habilitados'];
            $transaccion['created_at'] = Carbon::now();
            $transaccion->save();
            $transaccion->id;

            //Habilita los boletos en la DB.
            $array = json_decode($transaccion['habilitados']);
            foreach ($array as $value) {
                $habilitar = Boleto::find($value);
                $habilitar->id_transaccion = $transaccion->id;
                $habilitar->habilitado = 0;
                $habilitar->update();
            }
        }
        $data = ['msg' => 'Transacción guardada correctamente.'];
        return response()->json($data, 200);
    }
}
