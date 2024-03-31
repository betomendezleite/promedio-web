<?php

namespace App\View\Components\Settings\Planos;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Planos extends Component
{
    public $data;

    public function mount()
    {
        $this->data = "Hola perros";
    }
    public function render()
    {
        return view('components.settings.planos.planos');
    }
}
