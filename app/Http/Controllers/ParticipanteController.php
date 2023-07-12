<?php

namespace App\Http\Controllers;

use App\Models\Participante;

class ParticipanteController extends Controller
{
    public function index()
    {
        $participantes = Participante::select('id', 'ci_nit', 'nombre', 'telefono', 'email', 'fecha_nac')->get();

        return $participantes;
    }
}
