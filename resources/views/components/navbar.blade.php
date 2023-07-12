<header class="w-full">
    <div class=" container flex mx-auto items-center">
        <div class="logo">
            <a href="dashboard">
                <img src="{{asset ('img/logo-lotengo.svg')}}" alt="Lotengo" width="300" style="border: 1px" />
            </a>
        </div>
        <div class="ml-4 text-sm w-full text-center" id="cartonesPorHabilitar"></div>
        <div class="flex items-center gap-4">
            <a href="dashboard">
                <img src="{{asset ('img/ticket-solid.svg')}}" width="48" alt="Registro de Boletos" title="Registrar Nuevos Boletos" />
            </a>
            <a href="transacciones">
                <img src="{{asset ('img/list-solid.svg')}}" width="48" alt="Lista de Transacciones" title="Buscar Transacciones" />
            </a>
            <button id="btn-excell">
                <img src="{{asset ('img/icons8-ms-excel.svg')}}" width="56" alt="Exportar Excel" title="Exportar Todas las Transacciones a Excel" />
            </button>
            <a href="{{url('user/profile')}}">
                <img src="{{asset ('img/user-gear.svg')}}" width="48" alt="Perfil" title="Configuración de Usuario" />
            </a>
        </div>
        <form method="POST" action="{{url('logout')}}" x-data="">
            @csrf
            <input type="submit" name="logout" value="{{ auth()->user()->name }}" @click.prevent="$root.submit();" title="Cerrar Sesión de {{ auth()->user()->name }}" class="cursor-pointer p-2 ml-6 rounded-md text-right whitespace-nowrap border border-gray-400 text-gray-800 text-sm hover:bg-lime-200" />
        </form>
    </div>
</header>