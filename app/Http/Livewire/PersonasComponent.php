<?php

namespace App\Http\Livewire;

use App\Models\SituacionMorbida;
use App\Models\SituacionProfesional;
use App\Models\SituacionSocial;
use Carbon\Carbon;
use Livewire\Component;

class PersonasComponent extends Component
{
    public $fecha_nac;
    public $edad = 0;
    public $counter = 0;
    public $counterAnexo = 0;
    public $arrayParentesco = []; 
    public $arrayAnexo = []; 
    public $parentesco;
    
    
    public function render()
    {
        return view('livewire.personas-component',[
            'situacion_morbida' => SituacionMorbida::where('status' , 1)->get(),
            'situacion_social' => SituacionSocial::where('status' , 1)->get(),
            'situacion_profesional' => SituacionProfesional::where('status' , 1)->get()
        ]);
    }

    public function calculateEdad()
    {
        $this->edad = Carbon::parse($this->fecha_nac)->age;
    }

    public function addParentesco()
    {
        // dd("parent");
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

    public function addAnexo()
    {
        // dd("anex");
        $ii = $this->counterAnexo + 1;
        $this->counterAnexo = $ii;
        array_push($this->arrayAnexo, $ii);
    }
    
    /**
     * Borrar los input dinamicos de parentescos
     *
     * @param  int $key
     * @return array
     */
    public function deleteAnexo($key)
    {
        unset($this->arrayAnexo[$key]);
    }
}
