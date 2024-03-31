<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\EstatisticasController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\WebhookPaymentMPController;
use App\Http\Controllers\PlanosController;
use App\Http\Controllers\Register\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'index']);
Route::post('/store-token', [AuthController::class, 'storeToken'])->name('storeToken');
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/register/{nombre?}', [RegisterController::class, 'index']);
Route::get('/register/show/{id}', [RegisterController::class, 'show']);


Route::get('/dashboard', [DashboardController::class, 'index']);


Route::view('/settings', 'Settings.setting');
Route::view('/settings/planos/add', 'Settings.Planos.planos-add');
Route::get('/settings/planos/edit/{id}',  [PlanosController::class, 'edit']);
Route::get('test', [PlanosController::class, 'index']);

Route::get('/pagamentos', [PlanosController::class, 'payments']);
Route::get('/pagamentos/{id}', [PaymentController::class, 'create']);
Route::get('/pagamentos/status', [PaymentController::class, 'status']);
Route::post('/pagamentos/notification', [WebhookPaymentMPController::class, 'handleCheckoutProWebhook']);


Route::get('/estatisticas/{local}/{visitante}/{gameID}', [EstatisticasController::class, 'index']);
