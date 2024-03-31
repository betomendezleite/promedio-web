<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstatisticasController extends Controller
{
    public function index(Request $request, $local, $visitante, $gameID)
    {
        // Construir las URLs de las peticiones
        $url_visitante = env('API_BASEURL') . '/teams/' . $local;
        $url_local = env('API_BASEURL') . '/teams/' . $visitante;
        $url_betting = env('API_BASEURL') . '/betting-odds/' . $visitante . '/' . $local;

        // Realizar la petición al equipo local
        $response_local = Http::get($url_local);
        $local_data = $response_local->json(); // Convertir la respuesta JSON en un array asociativo

        $responseBetting = Http::get($url_betting);
        $bettingOddings = $responseBetting->json();




        // Realizar la petición al equipo visitanted
        $response_visitante = Http::get($url_visitante);
        $visitante_data = $response_visitante->json(); // Convertir la respuesta JSON en un array asociativo
        //dd($bettingOddings);
        // Puedes hacer lo que necesites con los datos de los equipos local y visitante
        // Por ejemplo, devolver los datos a la vista
        return view('estatisticas.index', [
            'local' => $local_data,
            'visitante' => $visitante_data,
            'bettingOddings' => $bettingOddings
        ]);
    }
}
