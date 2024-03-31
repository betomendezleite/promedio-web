@extends('template.app')
@section('title', 'PROMEDIO - Login - Analises de Apostas ')
@section('css')

<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/componente.css') }}">

@endsection




@section('content')




<div class="vector_bg"></div>
<div class="player_bg"></div>
<div class="player_bg_2"></div>
<div class=" w-100 content_login">


    <div class="box_login">

        <div class="alertLogin">
            asdsad
        </div>
        <form id="register" action="#" enctype="multipart/form-data">
            @csrf
            <img src="assets/logo.png" alt="" srcset="">
            <h3 class="color_white">CADASTRO</h3>

            <div class="input_promedio_group">
                <img src="assets/badge.svg" alt="" srcset="">
                <input name="name" id="name" class="input_promedio" type="text" placeholder="Nome">
            </div>
            <div class="input_promedio_group">
                <img src="assets/badge.svg" alt="" srcset="">
                <input name="lastname" id="lastname" class="input_promedio" type="text" placeholder="Sobrenome">
            </div>
            <div class="input_promedio_group">
                <img src="assets/call.svg" alt="" srcset="">
                <input name="phone" id="phone" class="input_promedio" type="text" placeholder="Telefone">
            </div>
            <div class="input_promedio_group">
                <img src="assets/mail_lock.svg" alt="" srcset="">
                <input name="username" id="username" class="input_promedio" type="text" placeholder="Username">
            </div>
            <div class="input_promedio_group">
                <img src="assets/mail_lock.svg" alt="" srcset="">
                <input name="email" id="email" class="input_promedio" type="email" placeholder="Email">
            </div>

            <div class="input_promedio_group">
                <img src="assets/lock.svg" alt="" srcset="">
                <input name="password" id="password" class="input_promedio" type="password" placeholder="Senha">
            </div>
            <div class="input_promedio_group">
                <img src="assets/badge.svg" alt="" srcset="">
                <input name="avatar" id="avatar" class="input_promedio" type="file" placeholder="Carregue uma imagem de perfil">
            </div>

            <div class="input_promedio_group">
                <img src="assets/badge.svg" alt="" srcset="">
                <input name="affiliate" id="affiliate" class="input_promedio" type="text" placeholder="Afiliado" value="{{$nombre}}" readonly>
            </div>

            <button type="submit" class="btn_sec btn">FINALIZAR CADASTRO</button>
        </form>

    </div>






    @endsection



    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#register').submit(function(event) {
                // Evitar que se envíe el formulario de manera predeterminada
                event.preventDefault();

                // Obtener los datos del formulario
                var formData = new FormData(this);

                // Realizar la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: '{{ env("API_BASEURL") }}/register-user',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Manejar la respuesta exitosa
                        console.log(response);
                        // Redireccionar u realizar otras acciones según sea necesario
                        var message = response.message;

                        // Mostrar el mensaje en el div con la clase "alertmessage"
                        $(".alertLogin").text(message).show();
                    },
                    error: function(error) {
                        // Manejar errores si es necesario
                        console.error('Error en la solicitud AJAX:', error);
                        console.log(error.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Obtener el valor seleccionado al cargar la página
            var selectedValue = $('#planosSelect').val();

            // Realizar la solicitud AJAX con el valor seleccionado
            enviarAjax(selectedValue);

            // Manejar el evento de cambio del select
            $('#planosSelect').change(function() {
                // Obtener el nuevo valor seleccionado
                var nuevoValorSeleccionado = $(this).val();

                // Realizar la solicitud AJAX con el nuevo valor seleccionado
                enviarAjax(nuevoValorSeleccionado);
            });

            function enviarAjax(valor) {
                // Realizar la solicitud AJAX con el valor proporcionado
                $.ajax({
                    type: 'GET',
                    url: '/register/show/' + valor,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Manejar la respuesta exitosa
                        console.log(response);
                    },
                    error: function(error) {
                        // Manejar errores aquí
                        console.error(error);
                    }
                });
            }
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


    @endsection