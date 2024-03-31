<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookPaymentMPController extends Controller
{
    public function handleCheckoutProWebhook(Request $request)
    {


        $accessToken = env('MP_token');
        try {
            $eventType = $request->input('type');
            $eventId = $request->input('data.id');

            $client = new Client([
                'base_uri' => 'https://api.mercadopago.com/v1/',
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
            ]);

            switch ($eventType) {
                case "payment":
                    $response = $client->get("payments/$eventId");
                    $payment = json_decode($response->getBody(), true);
                    Transaction::create([
                        'status' => $payment['status'],
                        'payment_id' => "$eventId",
                    ]);
                    Log::info('Payment processed successfully.');
                    break;
                case "plan":
                    $response = $client->get("plans/$eventId");
                    $plan = json_decode($response->getBody(), true);
                    Log::info('Plan processed successfully.');
                    break;
                case "subscription":
                    $response = $client->get("subscriptions/$eventId");
                    $subscription = json_decode($response->getBody(), true);
                    Log::info('Subscription processed successfully.');
                    break;
                case "invoice":
                    $response = $client->get("invoices/$eventId");
                    $invoice = json_decode($response->getBody(), true);
                    Log::info('Invoice processed successfully.');
                    break;
                case "point_integration_wh":
                    // $_POST contém as informações relacionadas à notificação.
                    Log::info('Point Integration Webhook received.');
                    break;
                default:
                    Log::info('Unknown event type.');
            }
        } catch (\Exception $e) {
            Log::error('Error processing webhook: ' . $e->getMessage());
        }

        return response()->json(['status' => 'success']);
    }
}
