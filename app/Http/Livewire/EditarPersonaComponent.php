<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Personas;
use App\Models\Parentesco;
use App\Models\SituacionSocial;
use App\Models\SituacionMorbida;
use App\Models\SituacionProfesional;

class EditarPersonaComponent extends Component
{
    public $persona;
    public $edad = 0;
    


    // public $situacion_m;
    

    public $situacion_morbida = [];
    public $situacion_social,$situacion_profesional;

    public $nombres,$apellido_materno,$apellido_paterno,$nro_documento,$direccion,$estado_civil,$fecha_nac,$nivel_instruccion,$pais_origen;

    public function mount(Personas $id)
    {
        $this->persona = $id;
        $this->parentescos = $id->parentescos;
        
        $this->nombres = $id->nombres;
        $this->nro_documento = $id->nro_documento;
        $this->apellido_paterno = $id->apellido_paterno;
        $this->apellido_materno = $id->apellido_materno;
        $this->direccion = $id->direccion;
        $this->fecha_nac = $id->fecha_nac;
        $this->edad = Carbon::parse($id->fecha_nac)->age;
        $this->nivel_instruccion = $id->nivel_instruccion;
        $this->estado_civil = $id->estado_civil;
        $this->pais_origen = $id->pais_origen;

    }

    public function render()
    {
        return view('livewire.editar-persona-component',[
            'situacion_m' => SituacionMorbida::where('status' , 1)->get(),
            'situacion_s' => SituacionSocial::where('status' , 1)->get(),
            'situacion_p' => SituacionProfesional::where('status' , 1)->get(),
        ]);
    }

    public function calculateEdad()
    {
        $this->edad = Carbon::parse($this->fecha_nac)->age;
    }

    public function editarPersona()
    {

        $this->persona->update([
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

        flash('Persona Editada correctamente!')->success();
        return redirect()->route('personas.index');
    }

    

}
