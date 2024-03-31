<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Http::get(env('API_BASEURL') . '/subscriptions');

            if ($response->successful()) {
                $data = $response->json();
                return view('Settings.Planos.planos', compact('data'));
            } else {
                return view('Settings.Planos.planos', ['data' => null]);
            }
        } catch (\Exception $e) {
            return view('Settings.Planos.planos', ['data' => null]);
        }
    }

    public function payments()
    {
        $planos = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token')
        ])->get(env('API_BASEURL') . '/subscriptions');



        return view('Settings.Planos.planos-pagamento', compact('planos'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get(env('API_BASEURL') . '/subscriptions/' . $id);
        $data = $response->json();
        return view('settings.planos.planos-edit', compact('data'));
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
}
