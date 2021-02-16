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

    public $nombres,$apellido_materno,$apellido_paterno,$nro_documento,$direccion,$estado_civil,$fecha_nac,$nivel_instruccion,$pais_origen,$tipo_documento,$observaciones,$ob_situacion_m,$ob_situacion_p,$ob_situacion_s;

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
        $this->observaciones = $id->observaciones;
        $this->tipo_documento = $id->tipo_documento;
        $this->ob_situacion_p = $id->ob_situacion_p;
        $this->ob_situacion_m = $id->ob_situacion_m;
        $this->ob_situacion_s = $id->ob_situacion_s;

    }

    public function render()
    {
        return view('livewire.editar-persona-component');
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
            'tipo_documento' => $this->tipo_documento,
            'observaciones' => $this->observaciones,
            'ob_situacion_m' => $this->ob_situacion_m,
            'ob_situacion_p' => $this->ob_situacion_p,
            'ob_situacion_s' => $this->ob_situacion_s,
        ]);

        flash('Persona Editada correctamente!')->success();
        return redirect()->route('personas.index');
    }

    

}
