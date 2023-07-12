<div>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8 w-full">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Lista de Transacciones</h2>
            </div>
            <div class="flex gap-4">
                <input type="text" wire:model="buscar_nombre" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 my-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Buscar por Nombre y/o Apellido" />
                <input type="text" wire:model="buscar_nit" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 my-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Buscar por CI o NIT" />
                <input type="text" wire:model="buscar_telefono" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 my-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-cyan-600 focus:border-transparent" placeholder="Buscar por Número de Teléfono" />
                <input type="text" wire:model="buscar_monto" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 my-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Buscar por Monto Acumulado" />
                <input type="text" wire:model="buscar_fecha" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-400 w-full py-2 px-4 my-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" placeholder="Buscar por Fecha" />
            </div>
            <div class="w-full">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    @if($toPrint=='[]')
                    <div class="p-6">No se encontró ningún resultado.</div>
                    @else
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    ID
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Nombre
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    CI/NIT
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Teléfono
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Email
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Monto Acumulado
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Cantidad Boletos
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Números
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Fecha
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Usuario
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($toPrint as $transaction)
                            <tr class="bg-white hover:bg-slate-200">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ $transaction->id_transaccion }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-left">{{ $transaction->nombre }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ $transaction->ci_nit }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ $transaction->telefono }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-center text-gray-900 hover:text-blue-800"><a href="mailto:{{ $transaction->email }}" target="_blank">{{ $transaction->email }}</a></p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-right">B$. {{ $transaction->monto_acumulado }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ $transaction->qty_boletos }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ $transaction->habilitados }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ date('d/m/Y H:i', strtotime($transaction->fecha)) }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 text-center">{{ $transaction->usuario }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <a href="imprimir/{{ $transaction->id_transaccion }}" target="new"><img src="{{asset ('img/print.svg')}}" alt="Lotengo" width="28" title="Ver transacción {{ $transaction->id_transaccion }}" /></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>