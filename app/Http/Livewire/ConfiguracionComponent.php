<?php

namespace App\Http\Livewire;

use App\Models\Configuracion;
use Livewire\Component;

class ConfiguracionComponent extends Component
{
    public $nombre_fundacion,$direccion_fundacion,$numero,$organizacion;

    public function mount()
    {
        $conf = Configuracion::latest()->first();

        $this->nombre_fundacion = $conf->nombre_fundacion ?? '';
        $this->direccion_fundacion = $conf->direccion_fundacion ?? '';
        $this->organizacion = $conf->organizacion ?? '';
        $this->numero = $conf->numero ?? '';
    }

    public function render()
    {
        return view('livewire.configuracion-component');
    }

    public function updateData()
    {

        $this->validate([
            'nombre_fundacion' => 'required|max:30',
            'direccion_fundacion' => 'required',
            'organizacion' => 'required',
            'numero' => 'required'
        ]);

        $configuracion = Configuracion::updateOrCreate(
            ['nombre_fundacion' => $this->nombre_fundacion],
            ['nombre_fundacion' => $this->nombre_fundacion,
            'direccion_fundacion' => $this->direccion_fundacion,
            'organizacion' => $this->organizacion,
            'numero' => $this->numero]
        );
        if($configuracion)
        {
            flash()->overlay('Has guardado la ocniguración correctamente', '¡Bien!')->livewire($this);
        }else{
            flash()->overlay('¡Error!', 'Alerta')->livewire($this);
        }
    }
}
