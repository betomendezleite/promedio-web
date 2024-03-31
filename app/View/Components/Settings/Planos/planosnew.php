<?php

namespace App\View\Components\Settings\Planos;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class planosnew extends Component
{
    public $data;

    public function mount()
    {
        $this->data = "Hola perros";
    }


    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // Lógica para consumir la API y obtener los datos
        $response = Http::get(env('API_BASEURL') . '/subscriptions');
        $data = $response->json();

        return view('components.settings.planos.planosnew', ['data' => $data]);
    }
}
