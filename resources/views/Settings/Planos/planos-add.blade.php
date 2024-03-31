@extends('template.app')

@section('Add Plano', 'PROMEDIO - Análisis de Apuestas')


@section('css')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/jogos_do_dia.css') }}">
<link rel="stylesheet" href="{{ asset('css/componente.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@endsection


@section('content')

@if(session()->has('token'))
{{-- La sesión 'token' existe, carga el contenido del dashboard --}}
@include('template.navbars.navbar-dashboard')



<div class="w-100">
    <br><br>
    <div class="box_login">
        <h3 class="color_white">ADICIONAR PLANO</h3>
        <div class="alertLogin"></div>

        <div class="input_promedio_group">
            <input class="input_promedio" type="text" name="nome" placeholder="Nome do plano">
        </div>

        <div class="input_promedio_group">
            <input class="input_promedio" type="number" name="validade" placeholder="Validade en dias">
        </div>

        <div class="input_promedio_group">
            <input class="input_promedio" type="number" step="0.01" name="preco" placeholder="Preço">
        </div>
        <div class="input_promedio_group">
            <input class="input_promedio" type="number" step="0.01" name="porcentagem" placeholder="Porcentagem de pagamento de referência">
        </div>
        <div class="input_promedio_group">
            <input class="input_promedio" type="text" name="recomendado" placeholder="Recomendado">
        </div>

        <div class="input_promedio_group">
            <input class="input_promedio" type="text" name="detalhes" placeholder="Detalhes">
        </div>

        <button id="AdicionarBtn" class="btn_sec btn">ADICIONAR</button>
    </div>
</div>



@else
{{-- La sesión 'token' no existe, redirige a la ruta '/login' --}}
<script>
    window.location.href = '{{ url("/login") }}';
</script>

@endif

@endsection

@section('scripts')
<!-- Agrega esto en tu HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Configurar el token CSRF en todas las solicitudes AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer ' + '{{ session("token") }}',
            }
        });

        $("#AdicionarBtn").click(function() {
            // Obtener los valores de los inputs
            var nome = $("input[name='nome']").val();
            var validade = $("input[name='validade']").val();
            var preco = $("input[name='preco']").val();
            var porcentagem = $("input[name='porcentagem']").val();
            var recomendado = $("input[name='recomendado']").val();
            var detalhes = $("input[name='detalhes']").val();

            // Realizar la solicitud AJAX
            $.ajax({
                type: "POST",
                url: "{{ env('API_BASEURL') }}/subscriptions",
                data: {
                    name: nome,
                    validate: validade,
                    price: preco,
                    reference_payment_percentage: porcentagem,
                    recomend: recomendado,
                    features: detalhes
                },
                success: function(response) {
                    // Manejar la respuesta exitosa
                    $(".alertLogin").text("PLANO CADASTRADO COM SUCESSO").show();
                    setTimeout(function() {
                        window.location.href = "/settings";
                    }, 3000);
                },
                error: function(error) {
                    // Manejar errores aquí
                    console.error(error);
                }
            });
        });
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