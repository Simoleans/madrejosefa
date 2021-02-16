<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Anexo;
use Livewire\Component;
use App\Models\Personas;
use App\Models\Parentesco;
use Livewire\WithFileUploads;
use App\Models\SituacionSocial;
use App\Models\SituacionMorbida;
use App\Models\SituacionProfesional;
use App\Models\SituacionSocialPersona;
use App\Models\SituacionMorbidaPersona;
use App\Models\SituacionProfesionalPersona;

class PersonasComponent extends Component
{
    use WithFileUploads;

    public $crearParentescoModal = false;
    public $user;
    public $edad = 0;
    public $counter = 0;
    public $counterAnexo = 0;
    public $arrayParentesco = []; 
    public $arrayAnexo = []; 
    public $parentesco;

    public $anexo;

    public $situacion_morbida,$situacion_social,$situacion_profesional;

    public $nombres,$apellido_materno,$apellido_paterno,$nro_documento,$direccion,$estado_civil,$fecha_nac,$nivel_instruccion,$pais_origen,$observaciones,$tipo_documento,$ob_situacion_m,$ob_situacion_p,$ob_situacion_s;
    
    public function render()
    {
        return view('livewire.personas-component',[
            'situacion_m' => SituacionMorbida::where('status' , 1)->get(),
            'situacion_s' => SituacionSocial::where('status' , 1)->get(),
            'situacion_p' => SituacionProfesional::where('status' , 1)->get(),
            'personas' => Personas::where('status',1)->get()
        ]);
    }

    public function calculateEdad()
    {
        $this->edad = Carbon::parse($this->fecha_nac)->age;
    }

    public function userName($id)
    {
        return Personas::findOrfail($id)->nombres;
    }

    public function addParentesco()
    {
        if($this->user == '')
        {
            return $this->addError('userError', 'No puede dejar el campo de persona vacío.');
        }
        
        if(in_array($this->user, array_column($this->arrayParentesco, 'user')))
        {
        return $this->addError('userError', 'Ya esta persona tiene un parentesco.');
        }
        $i = $this->counter + 1;
        $this->counter = $i;
        array_push($this->arrayParentesco, ['parentesco' => $this->parentesco , 'user' => $this->user,'name' => $this->userName($this->user)]);
        $this->reset(['parentesco','user']);
        $this->dispatchBrowserEvent('reset-user', ['value' => '']);
        $this->crearParentescoModal = false;
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
        //dd($this->anexo);
        $this->validate([
            'parentesco.*.user' => 'required',
            'parentesco.*.parentesco' => 'required',
            'tipo_documento' => 'required',
            'nro_documento' => 'unique:personas',
            'nombres' => 'required',
            'direccion' => 'required',
            'pais_origen' => 'required'
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
            'tipo_documento' => $this->tipo_documento,
            'observaciones' => $this->observaciones,
            'ob_situacion_m' => $this->ob_situacion_m,
            'ob_situacion_p' => $this->ob_situacion_p,
            'ob_situacion_s' => $this->ob_situacion_s,

        ]);
        
        if(count($this->arrayParentesco) > 0){
            foreach($this->arrayParentesco as $p)
            {
                Parentesco::create([
                    'persona_id' => $persona->id,
                    'user_id' => $p['user'],
                    'parentesco' => $p['parentesco'],
                ]);
            }
        }

        if($this->situacion_morbida != null){
            foreach($this->situacion_morbida as $s)
            {
                SituacionMorbidaPersona::create([
                    'persona_id' => $persona->id,
                    'situacion_id' => $s,
                ]);
            }
        }

        if($this->situacion_profesional != null){
            foreach($this->situacion_profesional as $s)
            {
                SituacionProfesionalPersona::create([
                    'persona_id' => $persona->id,
                    'situacion_id' => $s,
                ]);
            }
        }

        if($this->situacion_social != null){
            foreach($this->situacion_social as $s)
            {
                SituacionSocialPersona::create([
                    'persona_id' => $persona->id,
                    'situacion_id' => $s,
                ]);
            }
        }

        if($this->anexo != null){
            foreach($this->anexo as $a)
            {
                Anexo::create([
                    'persona_id' => $persona->id,
                    'foto' => $a['foto']->store('personas/anexos', 'public'),
                    'descripcion' => $a['descripcion'] ?? '',
                    'nombre' => $a['nombre'] ?? '',
                    'fecha_exp' => $a['fecha_exp'] ?? NULL
                ]);
            }
        }

        flash('Persona Registrada correctamente!')->success();
        return redirect()->route('personas.index');
        
    }

    public function modalCreate()
    {
        $this->crearParentescoModal = true;
    }

}
