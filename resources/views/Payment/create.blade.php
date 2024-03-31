@extends('template.app')

@section('Settings', 'PROMEDIO - Dashboard - Análisis de Apuestas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/jogos_do_dia.css') }}">
<link rel="stylesheet" href="{{ asset('css/componente.css') }}">
<link rel="stylesheet" href="{{ asset('css/datostablas.css') }}">

@endsection

@section('content')

@if(session()->has('token'))
{{-- La sesión 'token' existe, carga el contenido del dashboard --}}
@include('template.navbars.navbar-dashboard')








<br><br><br><br>
{{$planos['data']['name']}}


<h1>R$ {{$planos['data']['price']}}</h1> <br>
<h1>Extern: {{$external}}

</h1>





@else
{{-- La sesión 'token' no existe, redirige a la ruta '/login' --}}
<script>
    window.location.href = '{{ url("/login") }}';
</script>

@endif

@endsection

@section('scripts')








<div id="wallet_container"></div>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('APP_USR-3e3a7f16-72a4-45f0-8dbc-82c5ba9e39d0', {
        locale: 'pt-BR'
    });

    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $preferenceId }}",
        },
    });
</script>








<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtén el elemento body
        var bodyElement = document.body;

        // Agrega las clases al elemento body
        bodyElement.classList.add('w_100', 'bg_azul');


    });
</script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection