<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    //Forma de comunicar un evento con la vista
    // protected $listeners = [
    //     'prueba'
    // ];

    // public function prueba($vacante_id)
    // {
    //     dd('Desde prueba', $vacante_id);
    // }

    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante( Vacante $vacante )
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
