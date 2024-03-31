<?php

use App\Helpers\PlayerInfo;
?>

@extends('template.app')

@section('title', 'PROMEDIO - Dashboard - Análisis de Apuestas')

@section('css')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/jogos_do_dia.css') }}">
<link rel="stylesheet" href="{{ asset('css/componente.css') }}">
<link rel="stylesheet" href="{{ asset('css/componente.css') }}">
@endsection

@section('content')

@if(session()->has('token'))
{{-- La sesión 'token' existe, carga el contenido del dashboard --}}
@include('template.navbars.navbar-dashboard')

@viteReactRefresh
@vite('resources/js/app.js')
<div class="container_promedio">
    <div class="card">
        <div class="card_title">
            ESTADÍSTICAS PRE-JOGO
        </div>

        <div class="card_body p_1">
            <center>
                <div class="col_estat_jogo  ">
                    <div class="col_2 ">
                        <div>
                            <div class="box_back_logo ">
                                <div class="box_logo_dentro">
                                    <img class="h_100" src="{{ $local['espnLogo1'] ?? '' }}" alt="" srcset="">
                                </div>

                            </div>
                            <div class="">
                                <p class="f_12 color_azul">
                                    {{ $local['teamName'] ?? '' }}
                                </p>
                                <p class="f_12 color_azul">
                                    CONFERENCIA {{ $local['conferenceAbv'] ?? '' }}
                                </p>
                            </div>
                        </div>
                        <div class="col_1 grid_center_horizontal grid_center_vertical">
                            <div class="box_back_dados ">
                                <div class="box_back_dados_cont">
                                    <div class="col_1 grid_center_horizontal w_100">
                                        <div>
                                            <p class="fs_14 color_azul f_semibold" onmouseover="showTooltip(this, 'Na liga')">MÉDIA PONTOS</p>
                                        </div>
                                        <div class="col_2 w_100">
                                            <div class="w_100" style="display: flex; justify-content: space-around;">

                                                <p class="fs_10 color_azul" onmouseover="showTooltip(this, 'Pontos por jogos')">PPJ: {{ $local['ppg'] ?? '' }}</p>

                                            </div>
                                            <div class="w_100" style="display: flex; justify-content: space-around;">
                                                <p class="fs_10 color_azul " onmouseover="showTooltip(this, 'Pontos sofridos')">PSOF: {{ $local['oppg'] ?? '' }} </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="separador_box">

                            </div>
                            <div class="box_back_dados ">
                                <div class="box_back_dados_cont">
                                    <div class="col_1 grid_center_horizontal w_100">
                                        <div>
                                            <p class="fs_14 color_azul f_semibold" onmouseover="showTooltip(this, 'Média de pontos permitidos')">MÉDIA DEFENSIVA</p>
                                        </div>
                                        <div class="col_2 w_100">
                                            <div class="w_100" style="display: flex; justify-content: space-around;">
                                                <p class="fs_10 color_azul ">Local: {{ $local['defensivePtsAway'] ?? '' }}</p>

                                            </div>
                                            <div class="w_100" style="display: flex; justify-content: space-around;">
                                                <p class="fs_10 color_azul ">Visit:{{ $local['defensivePtsHome'] ?? '' }} </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="separador_box">

                            </div>
                            <div class="box_back_dados ">
                                <div class="box_back_dados_cont">
                                    <div class="col_1 grid_center_horizontal w_100">
                                        <div>
                                            <p class="fs_14 color_azul f_semibold" onmouseover="showTooltip(this, 'Média de pontos feitos')">MÉDIA OFENSIVA</p>
                                        </div>
                                        <div class="col_2 w_100">
                                            <div class="w_100" style="display: flex; justify-content: space-around;">
                                                <p class="fs_10 color_azul ">Local: {{ $local['ofensivePtsAway'] ?? '' }} </p>

                                            </div>
                                            <div class="w_100" style="display: flex; justify-content: space-around;">
                                                <p class="fs_10 color_azul ">Visit: {{ $local['ofensivePtsHome'] ?? '' }} </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col_1 grid_center_vertical">
                        <center>
                            <div class="box_back_dados_title gap_10 ">
                                <div class="box_back_dados_cont_title">
                                    <div class="col_1 grid_center_horizontal w_100">
                                        <div>
                                            <p class="fs_14 color_azul f_semibold"> PROJEÇÕES</p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div>
                                <br>
                                <table class="w_100">
                                    <thead>
                                        <th class="bg_azul color_white fs_14 " style="border-top-left-radius:10px ;">LOCAL</th>
                                        <th class="bg_azul color_white fs_14">TOTAL</th>
                                        <th class="bg_azul color_white fs_14" style="border-top-right-radius:10px ;">VISITANTE</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text_align_center color_azul bg_white">
                                                @php
                                                $totalUnder = $bettingOddings[0]['totalUnder'];
                                                $homeTeamSpread = $bettingOddings[0]['awayTeamSpread'];

                                                // Verificar si homeTeamSpread es positivo o negativo
                                                if (substr($homeTeamSpread, 0, 1) === '+') {
                                                // Si es positivo, sumar la mitad de totalUnder
                                                $resultado = $totalUnder / 2 + intval(substr($homeTeamSpread, 1));
                                                } elseif (substr($homeTeamSpread, 0, 1) === '-') {
                                                // Si es negativo, restar la mitad de totalUnder
                                                $resultado = $totalUnder / 2 - intval(substr($homeTeamSpread, 1));
                                                } else {
                                                // En caso de que no tenga signo, simplemente dividir totalUnder por 2
                                                $resultado = $totalUnder / 2;
                                                }
                                                session(['resultado2' => $resultado]);
                                                @endphp
                                                {{$resultado}}
                                            </td>
                                            <td class="text_align_center color_azul bg_white">{{$bettingOddings[0]['totalUnder']}}</td>
                                            <td class="text_align_center color_azul bg_white">



                                                @php
                                                $totalUnder = $bettingOddings[0]['totalUnder'];
                                                $homeTeamSpread = $bettingOddings[0]['homeTeamSpread'];

                                                // Verificar si homeTeamSpread es positivo o negativo
                                                if (substr($homeTeamSpread, 0, 1) === '+') {
                                                // Si es positivo, sumar la mitad de totalUnder
                                                $resultado = $totalUnder / 2 + intval(substr($homeTeamSpread, 1));
                                                } elseif (substr($homeTeamSpread, 0, 1) === '-') {
                                                // Si es negativo, restar la mitad de totalUnder
                                                $resultado = $totalUnder / 2 - intval(substr($homeTeamSpread, 1));
                                                } else {
                                                // En caso de que no tenga signo, simplemente dividir totalUnder por 2
                                                $resultado = $totalUnder / 2;
                                                }

                                                session(['resultado' => $resultado]);
                                                @endphp
                                                {{$resultado}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text_align_center bg_white color_azul">Handicap</td>
                                            <td class="text_align_center"></td>
                                            <td class="text_align_center bg_white color_azul">Handicap</td>
                                        </tr>
                                        <tr>
                                            <td class="text_align_center bg_white color_azul" style="border-bottom-left-radius:10px ;">


                                                @php
                                                // Obtener los valores de las variables de sesión
                                                $resultado = session('resultado');
                                                $resultado2 = session('resultado2');

                                                // Verificar si ambas variables de sesión están definidas
                                                if (isset($resultado) && isset($resultado2)) {
                                                // Calcular la resta de las variables de sesión
                                                $resta = $resultado - $resultado2;

                                                // Mostrar el resultado
                                                echo $resta;
                                                } else {
                                                // Mostrar un mensaje de error si alguna de las variables de sesión no está definida
                                                echo "No se pueden restar los valores porque alguna de las variables no está definida.";
                                                }
                                                @endphp
                                            </td>
                                            <td class="text_align_center"></td>
                                            <td class="text_align_center bg_white color_azul" style="border-bottom-right-radius:10px ;">
                                                @php
                                                // Obtener los valores de las variables de sesión
                                                $resultado = session('resultado');
                                                $resultado2 = session('resultado2');

                                                // Verificar si ambas variables de sesión están definidas
                                                if (isset($resultado) && isset($resultado2)) {
                                                // Calcular la resta de las variables de sesión
                                                $resta = $resultado2 - $resultado;

                                                // Mostrar el resultado
                                                echo $resta;
                                                } else {
                                                // Mostrar un mensaje de error si alguna de las variables de sesión no está definida
                                                echo "No se pueden restar los valores porque alguna de las variables no está definida.";
                                                }
                                                @endphp

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                    <div class="">
                        <div class="col_2 gap_10">

                            <div class="col_1 grid_center_horizontal grid_center_vertical">
                                <div class="box_back_dados ">
                                    <div class="box_back_dados_cont">
                                        <div class="col_1 grid_center_horizontal ">
                                            <div>
                                                <p class="fs_14 color_azul f_semibold" onmouseover="showTooltip(this, 'Na liga')">MÉDIA PONTOS</p>
                                            </div>
                                            <div class="col_2 w_100">
                                                <div class="w_100" style="display: flex; justify-content: space-around;">
                                                    <p class="fs_10 color_azul " onmouseover="showTooltip(this, 'Pontos por jogos')">PPJ: {{ $visitante['ppg'] ?? '' }} </p>

                                                </div>
                                                <div class="w_100" style="display: flex; justify-content: space-around;">
                                                    <p class="fs_10 color_azul " onmouseover="showTooltip(this, 'Pontos sofridos')">PSOF: {{ $visitante['oppg'] ?? '' }} </p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="separador_box">

                                </div>
                                <div class="box_back_dados ">
                                    <div class="box_back_dados_cont">
                                        <div class="col_1 grid_center_horizontal w_100">
                                            <div>
                                                <p class="fs_14 color_azul f_semibold" onmouseover="showTooltip(this, 'Média de pontos permitidos')">MÉDIA DEFENSIVA</p>
                                            </div>
                                            <div class="col_2 w_100">
                                                <div class="w_100" style="display: flex; justify-content: space-around;">
                                                    <p class="fs_10 color_azul ">Local: {{ $visitante['defensivePtsAway'] ?? '' }}</p>

                                                </div>
                                                <div class="w_100" style="display: flex; justify-content: space-around;">
                                                    <p class="fs_10 color_azul ">Visit:{{ $visitante['defensivePtsHome'] ?? '' }} </p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="separador_box">

                                </div>
                                <div class="box_back_dados ">
                                    <div class="box_back_dados_cont">
                                        <div class="col_1 grid_center_horizontal w_100">
                                            <div>
                                                <p class="fs_14 color_azul f_semibold" onmouseover="showTooltip(this, 'Média de pontos feitos')">MÉDIA OFENSIVA</p>
                                            </div>
                                            <div class="col_2 w_100">
                                                <div class="w_100" style="display: flex; justify-content: space-around;">
                                                    <p class="fs_10 color_azul ">Local:{{ $visitante['ofensivePtsAway'] ?? '' }} </p>

                                                </div>
                                                <div class="w_100" style="display: flex; justify-content: space-around;">
                                                    <p class="fs_10 color_azul ">Visit:{{ $visitante['ofensivePtsHome'] ?? '' }}</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box_back_logo ">
                                    <div class="box_logo_dentro">
                                        <img class="h_100" src="{{ $visitante['espnLogo1'] ?? '' }}" alt="" srcset="">
                                    </div>

                                </div>
                                <div class="">

                                    <p class="f_12 color_azul">
                                        {{ $visitante['teamName'] ?? '' }}
                                    </p>
                                    <p class="f_12 color_azul">
                                        CONFERÊNCIA {{ $visitante['conferenceAbv'] ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </center>

        </div>
    </div>
    <br>
    <!--     **********************
    LIDERES DE TIME
    *********************** -->
    <div class="card">
        <div class="card_title">
            LÍDERES DE TIME
        </div>
        <div class="card_body p_1">
            <div style="display: flex; justify-content: center;">
                <div>
                    <button type="button" data-tabid='1' onclick="openTab(event, 'tab1')" class="btn_ter btn ">Pontos</button>
                </div>
                <div>
                    <button type="button" data-tabid='2' onclick="openTab(event, 'tab2')" class="btn_ter btn">Rebotes</button>
                </div>
                <div>
                    <button type="button" data-tabid='3' onclick="openTab(event, 'tab3')" class="btn_ter btn">Assitências</button>
                </div>
                <div>
                    <button type="button" data-tabid='4' onclick="openTab(event, 'tab4')" class="btn_ter btn">Triplos</button>
                </div>
                <div>
                    <button type="button" data-tabid='5' onclick="openTab(event, 'tab5')" class="btn_ter btn">Bloqueio</button>
                </div>
                <div>
                    <button type="button" data-tabid='6' onclick="openTab(event, 'tab6')" class="btn_ter btn">Turnover</button>
                </div>
                <div>
                    <button type="button" data-tabid='6' onclick="openTab(event, 'tab7')" class="btn_ter btn">Recup. B.</button>
                </div>
            </div>
            <div id='tab1' style="display: flex; justify-content: center; margin: 40px; display: none;">
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['pts_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp


                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>


                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox"> {{ $local['pts_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['pts_total'] ?? '' }}</div>
                </div>

                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['pts_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>

            </div>
            <div id='tab2' style="display: flex; justify-content: center; margin: 40px; display: none;">

                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['reb_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox">{{ $local['reb_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['reb_total'] ?? '' }}</div>
                </div>
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['reb_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
            </div>
            <div id='tab3' style="display: flex; justify-content: center; margin: 40px; display: none;">
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['ast_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox">{{ $local['ast_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['ast_total'] ?? '' }}</div>
                </div>
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['ast_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
            </div>
            <div id='tab4' style="display: flex; justify-content: center; margin: 40px; display: none;">
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['tptfgm_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox">{{ $local['tptfgm_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['tptfgm_total'] ?? '' }}</div>
                </div>
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['tptfgm_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
            </div>
            <div id='tab5' style="display: flex; justify-content: center; margin: 40px; display: none;">
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['top_performers_blk_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox">{{ $local['top_performers_blk_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['top_performers_blk_total'] ?? '' }}</div>
                </div>
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['top_performers_blk_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
            </div>
            <div id='tab6' style="display: flex; justify-content: center; margin: 40px; display: none;">
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['tov_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox">{{ $local['tov_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['tov_total'] ?? '' }}</div>
                </div>
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['tov_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
            </div>
            <div id='tab7' style="display: flex; justify-content: center; margin: 40px; display: none;">
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($local['stl_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
                <div class="ContainerBoxPtsBox">
                    <div class="izqBoxPtsBox">{{ $local['stl_total'] ?? '' }}</div>
                    <div class="BoxPtsBox">
                        <div>PONTOS</div>
                    </div>
                    <div class="derBoxPtsBox">{{ $visitante['stl_total'] ?? '' }}</div>
                </div>
                @php
                // Llamar al helper y obtener el response
                $response = PlayerInfo::getNBAPlayerInfo($visitante['stl_player_id'], 'smith', 'averages');

                // Decodificar el JSON del response
                $datas = json_decode($response, true);
                @endphp
                <div>
                    <div class="box_back_logo">
                        <div class="box_logo_dentro">
                            <img style="padding: 6px;" class="h_100" src="{{ $datas['body']['espnHeadshot'] ?? '' }}" alt="" srcset="">
                        </div>
                    </div>
                    <div style="display: block; text-align: center;">
                        <h5 class="color_azul">{{ $datas['body']['espnName'] ?? '' }}</h5>
                        <h5 class="color_azul">{{ $datas['body']['pos'] ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card_title">
            MÉDIAS DA TEMPORADA
        </div>
        <div id="projecoesReact"></div>
        <div class="card_body">
            <div style="display: flex; justify-content: center;">
                <div>
                    <button type="button" data-tabid='8' onclick="openTab(event, 'tab8')" class="btn_ter btn ">Local</button>
                </div>
                <div>
                    <button type="button" data-tabid='9' onclick="openTab(event, 'tab9')" class="btn_ter btn">Visitante</button>
                </div>


            </div>
            <div id='tab8' style="display: grid; grid-template-columns: 1fr;">

                <div style="display: grid; grid-template-columns: 200px 1fr; margin: 40px;">
                    <div class="box_back_logo ">

                        <div>
                            <div class="box_logo_dentro">
                                <img class="h_100" src="{{ $local['espnLogo1'] ?? '' }}" alt="" srcset="">
                            </div>

                            <div class="box_back_dados w_100" style="width: 100% !important;">
                                <div class="box_back_dados_cont_2" style="width: 100% !important;">
                                    <div class="col_1 grid_center_vertical ">
                                        <div>
                                            <div class="drop_down">
                                                <button class="dropdow_btn">
                                                    MÉDIA PONTOS
                                                    <img src="{{asset('assets/arrow_drop_down.svg')}}" alt="Flecha hacia abajo">
                                                </button>
                                                <div class="dropdow_menu_btn">
                                                    <ul>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col_1" style="margin-left: 20px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr  1fr 1fr;">
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                            <div class="dados_single_med_temp">
                                <div class="dados_single_med_temp_cont">

                                    <div>
                                        <p class="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p class="fs_14">9</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div style="display: grid; grid-template-columns: 250px 1fr; margin: 40px;">

                    <div class="posicionesGraficos">
                        <div class="first-row">
                            <div>
                                <div>
                                    <img class="imgPosJugador" src="{{asset('assets/jugador.png')}}" />
                                    <p class="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img class="imgPosJugador" src="{{asset('assets/jugador.png')}}" />
                                    <p class="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img class="imgPosJugador" src="{{asset('assets/jugador.png')}}" />
                                    <p class="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                        </div>
                        <div class="second-row">
                            <div>
                                <div class="selectPosJugador">
                                    <img class="imgPosJugador" src="{{asset('assets/jugador.png')}}" />
                                    <p class="nomPosJugador">NOME POS</p>
                                </div>

                            </div>
                            <div>
                                <div>
                                    <img class="imgPosJugador" src="{{asset('assets/jugador.png')}}" />
                                    <p class="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div>
                        <div id="chart"></div>
                    </div>
                </div>


            </div>
            <div id='tab9' style="display: flex; justify-content: center; margin: 40px; display: none;">
                Visitante
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card_title"> PROJEçOES
        </div>
        <div class="card_body" style="display: flex; justify-content: center;">

            <div class="dados_single_med_temp">
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card_title"> PONTOS PERMITIDOS POR POSIçAO</div>
        <div class="card_body" style="display: flex; justify-content: center;">
            <div class="dados_single_med_temp">
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">POS</p>
                    </div>
                    <div>
                        <p class="fs_14">PG</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
                <div class="dados_single_med_temp_cont">

                    <div>
                        <p class="fs_14">JOGOS</p>
                    </div>
                    <div>
                        <p class="fs_14">9</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card_title"> ESCALAÇÕES</div>
        <div class="card_body" style="display: flex; justify-content: center;">
            <div style="color: #021742; margin: 40px;">
                <h3>LOCAL</h3>
                <h5>Esperada</h5>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <br>
                <h5>Nao pode jogar</h5>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
            </div>
            <div style="color: #021742; margin: 40px;">
                <h3>LOCAL</h3>
                <h5>Esperada</h5>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <br>
                <h5>Nao pode jogar</h5>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
                <p>NOME DO JOGADOR</p>
            </div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtén el elemento body
        var bodyElement = document.body;

        // Agrega las clases al elemento body
        bodyElement.classList.add('w_100', 'bg_azul');

        var options = {
            series: [{
                name: 'Pontos',
                data: [{
                        x: '1',
                        y: 20,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '2',
                        y: 18,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '3',
                        y: 10,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '4',
                        y: 15,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '5',
                        y: 8,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '6',
                        y: 5,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '7',
                        y: 19,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                    {
                        x: '8',
                        y: 19,
                        goals: [{
                            name: 'Média',
                            value: 15,
                            strokeHeight: 5,
                            strokeColor: '#f7a22b'
                        }]
                    },
                ]
            }],
            chart: {
                height: 350,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    columnWidth: '60%'
                }
            },
            colors: ['#021742'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: true,
                customLegendItems: ['Pontos', 'Média (5/8)'],
                markers: {
                    fillColors: ['#021742', '#f7a22b']
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


    });
    // Función para mostrar el tooltip
    function showTooltip(element, text) {
        // Creamos el tooltip si no existe
        if (!document.getElementById('tooltip')) {
            var tooltip = document.createElement('div');
            tooltip.id = 'tooltip';
            tooltip.className = 'tooltip';
            document.body.appendChild(tooltip);
        } else {
            var tooltip = document.getElementById('tooltip');
        }

        // Actualizamos el contenido del tooltip y su posición
        tooltip.innerHTML = text;
        tooltip.style.display = 'block';
        tooltip.style.top = (element.offsetTop + element.offsetHeight) + 'px';
        tooltip.style.left = (element.offsetLeft + (element.offsetWidth - tooltip.offsetWidth) / 2) + 'px';

        // Ocultamos el tooltip cuando el cursor se aleja del elemento
        element.onmouseout = function() {
            tooltip.style.display = 'none';
        };
    }
</script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    // Esta función se ejecutará cuando la página se cargue
    window.onload = function() {
        // Mostrar la pestaña por defecto (tab1)
        var defaultTab = document.getElementById('tab1');
        defaultTab.style.display = 'flex';

        // Activar el botón correspondiente a la pestaña por defecto (tab1)
        var defaultButton = document.querySelector('[data-tabid="1"]');
        defaultButton.classList.add('active');
        defaultButton.classList.add('tabActive');
    };

    function openTab(evt, tabId) {
        // Ocultar todos los contenidos de pestañas y desactivar todos los botones
        var tabContents = document.querySelectorAll('[id^="tab"]');
        tabContents.forEach(function(tabContent) {
            tabContent.style.display = "none";
        });

        var buttons = document.querySelectorAll('.btn.tabActive');
        buttons.forEach(function(button) {
            button.classList.remove("active");
            button.classList.remove("tabActive");
        });

        // Mostrar el contenido de la pestaña seleccionada y activar su botón
        var tabContent = document.getElementById(tabId);
        tabContent.style.display = "flex";

        // Activar el botón seleccionado
        evt.currentTarget.classList.add("active");
        evt.currentTarget.classList.add("tabActive");
    }
</script>



@endsection