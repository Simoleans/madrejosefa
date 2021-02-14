<?php

namespace App\Http\Livewire;

use App\Models\Anexo;
use App\Models\Parentesco;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Personas;
use App\Models\SituacionSocial;
use App\Models\SituacionMorbida;
use App\Models\SituacionProfesional;

class PersonasComponent extends Component
{
    public $edad = 0;
    public $counter = 0;
    public $counterAnexo = 0;
    public $arrayParentesco = []; 
    public $arrayAnexo = []; 
    public $parentesco;

    public $nombres,$apellido_materno,$apellido_paterno,$nro_documento,$direccion,$estado_civil,$fecha_nac,$nivel_instruccion,$pais_origen;
    
    
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
        $ii = $this->counterAnexo + 1;
        $this->counterAnexo = $ii;
        array_push($this->arrayAnexo, $ii);
    }
    
    /**
     * Borrar los input dinamicos de Anexos
     *
     * @param  int $key
     * @return array
     */
    public function deleteAnexo($key)
    {
        unset($this->arrayAnexo[$key]);
    }

    public function storePersona()
    {

        $this->validate([
            'parentesco.*.user' => 'required',
            'parentesco.*.parentesco' => 'required',
            'parentesco' => 'required|array|max:5'
        ],
        [
            'parentesco.*.user.required' => 'El usuario no puede quedar vacio.',
            'parentesco.*.parentesco.required' => 'El parentesco no puede quedar vacia.',
            'parentesco.max' => 'Solo se permiten 5 parentescos.'
        ]);
        $persona = Personas::create([
            'nombres' => $this->nombres,
            'apellido_materno' => $this->apellido_materno,
            'apellido_paterno' => $this->apellido_paterno,
            'direccion' => $this->direccion,
            'estado_civil' => $this->estado_civil,
            'fecha_nac' => $this->fecha_nac,
            'nivel_instruccion' => $this->nivel_instruccion,
            'pais_origen' => $this->pais_origen,
            'nro_documento' => $this->nro_documento,
        ]);

        foreach($this->parentesco as $p)
        {
            Parentesco::create([
                'persona_id' => $persona->id,
                'user_id' => $p['user'],
                'parentesco' => $p['parentesco'],
            ]);
        }

        flash('Persona Registrado correctamente!')->success();
        
    }
}
