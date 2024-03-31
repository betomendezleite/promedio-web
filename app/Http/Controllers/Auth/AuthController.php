<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TokenHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Devuelve una instancia de RedirectResponse para redirigir a la ruta /login
        return view('Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeToken(Request $request)
    {
        // Obtén el token del cuerpo de la solicitud
        //    $token = $request->token;

        // Almacena el token en la variable de sesión
        Session::put('token', $request->token);
        Session::put('user_id', strval($request->userId));
        Session::put('person_id', strval($request->personId));

        // Respuesta de éxito
        return response()->json(['status' => 'success']);
    }

    public function logout()
    {
        $token = session('token');

        if ($token) {
            $url = env('API_BASEURL') . '/logout';

            // Intenta revocar el token en la API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post($url);
            Session::forget('token');
            Session::forget('person_id');
            Session::forget('user_id');
            // Verifica si la revocación fue exitosa antes de redirigir
            if ($response->successful()) {
                // Elimina el token de la sesión
                Session::forget('token');

                // Redirige al usuario a la ruta /login
                return Redirect::to('/login');
            }
        }

        // Si algo falla, redirige a /settings
        return Redirect::to('/settings');
    }
}
