<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Transaccion;

class ListaTransacciones extends Component
{
    public $buscar_nombre = "";
    public $buscar_nit = "";
    public $buscar_telefono = "";
    public $buscar_monto = "";
    public $buscar_fecha = "";

    public function render()
    {
        $toPrint = Transaccion::select('transaccions.id as id_transaccion', 'users.name as usuario', 'nombre', 'ci_nit', 'telefono', 'participantes.email', 'transaccions.created_at as fecha', 'monto_acumulado', 'qty_boletos', 'habilitados')
            ->join('participantes', 'participantes.id', '=', 'transaccions.id_participante')
            ->join('users', 'users.id', '=', 'transaccions.id_user')
            ->where('nombre', 'like', '%' . $this->buscar_nombre . '%')
            ->where('ci_nit', 'like', '%' . $this->buscar_nit . '%')
            ->where('telefono', 'like', '%' . $this->buscar_telefono . '%')
            ->where('monto_acumulado', 'like', '%' . $this->buscar_monto . '%')
            ->where('transaccions.created_at', 'like', '%' . $this->buscar_fecha . '%')
            ->orderBy('id_transaccion', 'DESC')
            ->get();

        return view('livewire.lista-transacciones', compact('toPrint'));
    }
}
