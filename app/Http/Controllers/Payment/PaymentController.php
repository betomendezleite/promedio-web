<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    function create($id_plano = null)
    {

        $planos = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token')
        ])->get(env('API_BASEURL') . '/subscriptions/' . $id_plano);



        //CREACION DE EXTERNAL REFERENCE

        // Obtém o nome de usuário do usuário autenticado
        $usrnm = session('user_id');

        // Gera um número aleatório entre 10000000 e 99999999
        $randomNumber = mt_rand(10000000, 99999999);

        // Obtém a data e minutos atuais
        $currentDateTime = now();
        $dateMinutes = $currentDateTime->format('YmdHi');

        // Concatena os elementos para criar a external reference
        $externalReference = 'user_' . $usrnm . $randomNumber . $dateMinutes;







        Session::put('validate_days', $planos['data']['validate']);
        // Configura tus credenciales de Mercado Pago
        $accessToken = env('MP_TOKEN');
        $url = 'https://api.mercadopago.com/checkout/preferences';


        // Configura los datos de la preferencia
        $preferenceData = [
            'items' => [
                [
                    'title' => $planos['data']['name'],
                    'quantity' => 1,
                    'currency_id' => 'BRL',
                    'unit_price' => floatval($planos['data']['price']),
                ],
            ],
            'back_urls' => [
                'success' => url('/pagamentos/status?status=success'),
                'failure' => url('/pagamentos/status?status=failure'),
                'pending' => url('/pagamentos/status?status=pending'),
            ],

            "external_reference" => $externalReference,
            // ... otros campos de preferencia según tus necesidades
        ];

        // Realiza la solicitud a la API de Mercado Pago
        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => $preferenceData,
        ]);

        // Decodifica la respuesta JSON
        $responseData = json_decode($response->getBody(), true);

        // Extrae el ID de la preferencia
        $preferenceId = $responseData['id'];
        $plns = strval($planos['data']['id']);
        $payments_generate = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token')
            // Otros encabezados...
        ])->post(env('API_BASEURL') . '/payments/', [
            "user_id" => session('user_id'),
            "person_id" => session('person_id'),
            "id_payment" => "$externalReference",
            "status" => "pending",
            "type" => "subscription",
            "subscription" => "$plns",
        ]);
        $external = $responseData['external_reference'];
        return view('payment.create', compact('planos', 'preferenceId', 'external'));
    }
    public function status()
    {
        return view('payment.status');
    }
}
