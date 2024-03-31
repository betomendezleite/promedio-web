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

        <img src="assets/logo.png" alt="" srcset="">
        <h3 class="color_white">LOGIN</h3>

        <div class="alertLogin">
            asdsad
        </div>
        <div class="input_promedio_group">
            <img src="{{asset('assets/mail_lock.svg')}}" alt="" srcset="">
            <input class="input_promedio" type="email" placeholder="Insira seu email, celular ou username">
        </div>

        <div class="input_promedio_group">
            <img src="{{asset('assets/lock.svg')}}" alt="" srcset="">
            <input class="input_promedio" type="password" placeholder="Insira sua Senha">
        </div>





        <button id="loginBtn" class="btn_sec btn">LOGIN</button>
        <p class="color_white fs_14 f_ligth">
            Você <a href="/register"><span class="color_orange_1">não tem uma conta</span></a> ou
            <a href=""> <span class="color_orange_1">deseja renovar sua conta</span> </a> .
        </p>
    </div>
</div>










@endsection



@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtén el elemento body
        var bodyElement = document.body;

        // Agrega las clases al elemento body
        bodyElement.classList.add('w_100', 'bg_azul');
    });
</script>
<script>
    document.getElementById('loginBtn').addEventListener('click', function() {
        // Obtén los valores de los campos de entrada
        var emailOrUsername = document.querySelector('.input_promedio[type="email"]').value;
        var password = document.querySelector('.input_promedio[type="password"]').value;

        // Crea un objeto FormData para enviar los datos
        var formData = new FormData();
        formData.append('login', emailOrUsername);
        formData.append('password', password);

        // Realiza la solicitud Ajax utilizando la API Fetch
        fetch('{{ env("API_BASEURL") }}/login', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },

                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error en la solicitud: ${response.statusText}`);
                }
                return response.json();
            })
            .then(responseData => handleSuccess(responseData))
            .catch(error => handleError(error));
    });

    function handleSuccess(responseData) {
        console.log(responseData);

        // Verifica si la respuesta contiene un token
        if (responseData.token) {
            // Almacena el token en una variable de sesión en el lado del cliente (en este caso, en localStorage)
            localStorage.setItem('user_token', responseData.token);
            console.log("Token: " + responseData.user_id);
            // Realiza una solicitud adicional al servidor Laravel para almacenar el token en la variable de sesión del servidor
            storeTokenOnServer(responseData.token, responseData.user_id, responseData.person_id);

            window.location.href = '/dashboard';
        }
    }

    function handleError(error) {
        console.error(error);

        var alertLogin = document.querySelector('.alertLogin');
        alertLogin.style.backgroundColor = 'red';
        alertLogin.innerText = 'Error en la autenticación.';
        alertLogin.style.display = 'block';
    }

    function storeTokenOnServer(token, userId, personId) {
        // Realiza una solicitud adicional al servidor Laravel para almacenar el token en la sesión del servidor
        fetch('{{ route("storeToken") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegúrate de incluir el token CSRF si lo estás utilizando

                },
                body: JSON.stringify({
                    "token": token,
                    "userId": userId,
                    "personId": personId
                })
            })
            .then(response => {
                if (!response.ok) {
                    console.log(response);
                    throw new Error(`Error al almacenar el token en el servidor: ${response.statusText}`);
                }
                return response.json();
            })
            .then(responseData => console.log(responseData))
            .catch(error => console.error(error));
    }
</script>

@endsection