<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Personas;
use App\Models\Parentesco;
use App\Models\SituacionSocial;
use App\Models\SituacionMorbida;
use App\Models\SituacionProfesional;
use App\Models\SituacionMorbidaPersona;

class AgregadoPersonaComponent extends Component
{

    public $editarParentescoModal = false;
    public $crearParentescoModal = false;
    public $crearSituacionMorbidaModal = false;
    public $parentesco_id;
    public $parentescos;
    public $parentesco;
    public $persona;
    public $personas = [];
    public $user;

    public $situacion_morbida;
    
    public function mount(Personas $id)
    {
        $this->persona = $id;
        $this->parentescos = $id->parentescos;
        
        // $this->nombres = $id->nombres;
        // $this->nro_documento = $id->nro_documento;
        // $this->apellido_paterno = $id->apellido_paterno;
        // $this->apellido_materno = $id->apellido_materno;
        // $this->direccion = $id->direccion;
        // $this->fecha_nac = $id->fecha_nac;
        // $this->edad = Carbon::parse($id->fecha_nac)->age;
        // $this->nivel_instruccion = $id->nivel_instruccion;
        // $this->estado_civil = $id->estado_civil;
        // $this->pais_origen = $id->pais_origen;

    }

    public function render()
    {
        return view('livewire.agregado-persona-component',[
            'situacion_m' => SituacionMorbida::where('status' , 1)->get(),
            'situacion_s' => SituacionSocial::where('status' , 1)->get(),
            'situacion_p' => SituacionProfesional::where('status' , 1)->get(),
        ]);
    }

    public function closeModalAndResetField()
    {
        $this->parentesco_id = '';
        $this->parentescos = $this->persona->parentescos;
        $this->editarParentescoModal = false;
        $this->crearParentescoModal = false;
    }

    public function editParentesco($id)
    {
        $this->editarParentescoModal = true;
        $data = Parentesco::findOrfail($id);
        $this->parentesco_id = $data->id;
        $this->parentesco = $data->parentesco;
    }

    

    public function getParentescos()
    {
        $this->parentescos = $this->persona->parentescos;
    }

    public function editarParentescoForm()
    {
        $data = Parentesco::findOrfail($this->parentesco_id);
        $data->parentesco = $this->parentesco;
        $data->save();

        $this->closeModalAndResetField();
        flash()->overlay('Has editado el parentesco correctamente', 'Editar Parentesco');
        return redirect()->route('personas.agregado',$this->persona->id);

    }

    public function deleteParentesco($id)
    {
        $data = Parentesco::findOrfail($id);
        $data->delete();
        flash()->overlay('Has eliminado el parentesco correctamente', 'Eliminar Parentesco');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function modalCreate()
    {
        $this->personas = Personas::where('status',1)->get();
        $this->crearParentescoModal = true;
    }

    public function modalCreateSituacionMorbida()
    {
        $this->crearSituacionMorbidaModal = true;
    }

    public function agregarParentescoForm()
    {
        Parentesco::create([
            'persona_id' => $this->persona->id,
            'user_id' => $this->user,
            'parentesco' => $this->parentesco,
        ]);

        flash()->overlay('Has agregado el parentesco correctamente', 'Agregar Parentesco');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function agregarSituacionMorbidaform()
    {
        $exists = SituacionMorbidaPersona::where('situacion_id',$this->situacion_morbida)->where('persona_id', $this->persona->id)->exists();
        if($exists)
        {
            return $this->addError('exists', 'Ya este situación está agregada.');
        }
        SituacionMorbidaPersona::create([
            'persona_id' => $this->persona->id,
            'situacion_id' => $this->situacion_morbida,
        ]);

        flash()->overlay('Has agregado la situacion morbida correctamente', 'Agregar Situacion Morbida');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function deleteSituacionMorbida($id)
    {
        $data = SituacionMorbidaPersona::findOrfail($id);
        $data->delete();
        flash()->overlay('Has eliminado la situación correctamente', 'Eliminar Situación Morbida');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

}
