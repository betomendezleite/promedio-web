@extends('template.app')

@section('Settings', 'PROMEDIO - Dashboard - Análisis de Apuestas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/jogos_do_dia.css') }}">
<link rel="stylesheet" href="{{ asset('css/componente.css') }}">
<link rel="stylesheet" href="{{ asset('css/datostablas.css') }}">


<style>
    .tab-container {
        width: 100%;
        max-width: 800px;
        margin: 50px auto;
    }

    .tab-header {
        overflow: hidden;
        background-color: #f1f1f1;
    }

    .tab-button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        color: #021742;
    }

    .tab-button:hover {
        background-color: #ddd;
    }

    .tab-content {
        display: none;
        padding: 20px;
        background: #021742;
        box-shadow: 0px 10px 20px 0px #000;
    }

    .tab-content h2 {
        color: #333;
    }
</style>
@endsection

@section('content')

@if(session()->has('token'))
{{-- La sesión 'token' existe, carga el contenido del dashboard --}}
@include('template.navbars.navbar-dashboard')



<div class="tab-container">
    <div class="tab-header">
        <button class="tab-button" onclick="openTab(event, 'tab1')">Planos</button>
        <button class="tab-button" onclick="openTab(event, 'tab2')">Usuarios</button>
        <button class="tab-button" onclick="openTab(event, 'tab3')">Planos</button>
    </div>

    <div id="tab1" class="tab-content">

        <x-settings.planos.planosnew />











    </div>

    <div id="tab2" class="tab-content">
        <h2>Content for Tab 2</h2>
        <p>This is the content for Tab 2.</p>
    </div>

    <div id="tab3" class="tab-content">
        <h2>Content for Tab 3</h2>
        <p>This is the content for Tab 3.</p>
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




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Manejar clic en el botón
        $('.delete-button').on('click', function() {
            // Obtener el ID del atributo de datos
            var itemId = $(this).data('id');
            var baseurl = "{{ env('API_BASEURL') }}/subscriptions/";
            // Realizar la solicitud AJAX
            $.ajax({
                url: baseurl + itemId,
                type: 'DELETE', // O 'POST' si es una actualización, por ejemplo
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + '{{ session("token") }}',
                },
                success: function(response) {
                    console.log(response.status); // Agrega este registro
                    if (response.status === 200) {
                        setTimeout(function() {
                            location.href = '/settings';
                        }, 500);
                    }
                },
                error: function(error) {
                    // Manejar errores si es necesario
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
    });
</script>












<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show the default tab on page load
        openTab(null, 'tab1');
    });

    function openTab(event, tabName) {
        var i, tabContent, tabButton;

        // Hide all tab content
        tabContent = document.getElementsByClassName('tab-content');
        for (i = 0; i < tabContent.length; i++) {
            tabContent[i].style.display = 'none';
        }

        // Remove the 'active' class from all tab buttons
        tabButton = document.getElementsByClassName('tab-button');
        for (i = 0; i < tabButton.length; i++) {
            tabButton[i].className = tabButton[i].className.replace(' active', '');
        }

        // Show the selected tab content and add an 'active' class to the button
        document.getElementById(tabName).style.display = 'block';
        if (event) {
            event.currentTarget.className += ' active';
        }
    }
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