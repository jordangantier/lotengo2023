<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Transacciones | Lo Tengo! - las Brisas</title>
    <link rel="stylesheet" href="{{asset ('css/app.css')}}" />
    <link rel="icon" type="image/png" href="{{asset ('img/favicon.png')}}" />
    <script type="module" src="{{asset ('js/applotengo.js')}}"></script>
    <script type="module" src="{{asset ('js/exportToExcell.js')}}"></script>
    <script lang="javascript" src="{{asset ('js/xlsx.full.min.js')}}"></script>
    @livewireStyles
</head>

<body class="bg-stone-50">
    <div class="min-h-full flex flex-col justify-center items-center bg-stone-50 text-stone-900">
        @include('components.navbar')
        <main class="mt-8">
            @livewire('lista-transacciones')
        </main>
        @include('components.footer')
    </div>
    <!-- <div id="print" hidden style="padding: 262px 13px 71px 313px; width: 595px; height: 396px"></div> -->
    @livewireScripts
</body>
<style>
    /* body {
    font-family: 'Poppins', sans-serif;
    } */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
        appearance: textfield;
    }
</style>

</html>