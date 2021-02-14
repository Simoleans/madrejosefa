<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class PersonasComponent extends Component
{
    public $fecha_nac;
    public $edad = 0;
    public $counter = 0;
    public $arrayParentesco = []; 
    public $parentesco;
    
    
    public function render()
    {
        return view('livewire.personas-component');
    }

    public function calculateEdad()
    {
        $this->edad = Carbon::parse($this->fecha_nac)->age;
    }

    public function addParentesco()
    {
        $i = $this->counter + 1;
        $this->counter = $i;
        array_push($this->arrayParentesco, $i);
    }
    
    /**
     * Borrar los input dinamicos de parentescos
     *
     * @param  int $key
     * @return array
     */
    public function deleteParentesco($key)
    {
        unset($this->arrayParentesco[$key]);
    }
}
