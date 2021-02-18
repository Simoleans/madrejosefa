<?php

namespace App\Http\Livewire;

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

class AgregadoPersonaComponent extends Component
{
    use WithFileUploads;
    
    public $editarParentescoModal = false;
    public $crearParentescoModal = false;
    public $crearSituacionProfesionalModal = false;
    public $crearAnexoModal = false;
    public $crearSituacionSocialModal = false;
    public $crearSituacionMorbidaModal = false;
    public $parentesco_id;
    public $parentescos;
    public $parentesco;
    public $persona;
    public $user;

    public $foto,$nombre,$descripcion,$fecha_exp;

    public $situacion_morbida,$situacion_profesional,$situacion_social;

    public $nombres_paren,$apellido_materno_paren,$apellido_paterno_paren,$nro_documento_paren,$direccion_paren,$estado_civil_paren,$fecha_nac_paren,$nivel_instruccion_paren,$pais_origen_paren,$tipo_documento_paren;
    
    public function mount(Personas $id)
    {
        $this->persona = $id;
        $this->parentescos = $id->parentescos;
        // dd($this->parentescos);
    }

    public function render()
    {
        return view('livewire.agregado-persona-component',[
            'situacion_m' => SituacionMorbida::where('status' , 1)->get(),
            'situacion_s' => SituacionSocial::where('status' , 1)->get(),
            'situacion_p' => SituacionProfesional::where('status' , 1)->get(),
            'personas' => Personas::where('status',1)->where('id','!=',$this->persona->id)->get()
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

    public function agregarParentescoForm()
    {
        Parentesco::create([
            'persona_id' => $this->persona->id,
            'parentesco' => $this->parentesco,
            'nombres' => $this->nombres_paren,
            'apellido_materno' => $this->apellido_materno_paren,
            'apellido_paterno' => $this->apellido_paterno_paren,
            'direccion' => $this->direccion_paren,
            'estado_civil' => $this->estado_civil_paren,
            'fecha_nac' => $this->fecha_nac_paren,
            'nivel_instruccion' => $this->nivel_instruccion_paren,
            'pais_origen' => $this->pais_origen_paren,
            'nro_documento' => $this->nro_documento_paren,
            'tipo_documento' => $this->tipo_documento_paren,

        ]);

        flash()->overlay('Has agregado el parentesco correctamente', 'Agregar Parentesco');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function modalCreateSituacionMorbida()
    {
        $this->crearSituacionMorbidaModal = true;
    }

    public function agregarSituacionMorbidaform()
    {
        $exists = SituacionMorbidaPersona::where('situacion_id',$this->situacion_morbida)->where('persona_id', $this->persona->id)->exists();
        if($exists)
        {
            return $this->addError('exists', 'Ya esta situación existe en la persona.');
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

    public function modalCreateSituacionProfesional()
    {
        $this->crearSituacionProfesionalModal = true;
    }

    public function agregarSituacionProfesionalform()
    {
        $exists = SituacionProfesionalPersona::where('situacion_id',$this->situacion_profesional)->where('persona_id', $this->persona->id)->exists();
        if($exists)
        {
            return $this->addError('exists', 'Ya esta situación existe en la persona.');
        }
        SituacionProfesionalPersona::create([
            'persona_id' => $this->persona->id,
            'situacion_id' => $this->situacion_profesional,
        ]);

        flash()->overlay('Has agregado la situacion profesional correctamente', 'Agregar Situacion Profesional');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function deleteSituacionProfesional($id)
    {
        $data = SituacionProfesionalPersona::findOrfail($id);
        $data->delete();
        flash()->overlay('Has eliminado la situación correctamente', 'Eliminar Situación Profesional');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function modalCreateSituacionSocial()
    {
        $this->crearSituacionSocialModal = true;
    }

    public function agregarSituacionSocialform()
    {
        $exists = SituacionSocialPersona::where('situacion_id',$this->situacion_social)->where('persona_id', $this->persona->id)->exists();
        if($exists)
        {
            return $this->addError('exists', 'Ya esta situación existe en la persona.');
        }
        SituacionSocialPersona::create([
            'persona_id' => $this->persona->id,
            'situacion_id' => $this->situacion_social,
        ]);

        flash()->overlay('Has agregado la situacion social correctamente', 'Agregar Situacion Social');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function deleteSituacionSocial($id)
    {
        $data = SituacionSocialPersona::findOrfail($id);
        $data->delete();
        flash()->overlay('Has eliminado la situación correctamente', 'Eliminar Situación Social');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function modalCreateAnexo()
    {
        $this->crearAnexoModal = true;
    }

    public function agregarAnexoform()
    {
        Anexo::create([
            'persona_id' => $this->persona->id,
            'foto' => $this->foto->store('personas/anexos', 'public'),
            'descripcion' => $this->descripcion,
            'nombre' => $this->nombre,
            'fecha_exp' => $this->fecha_exp
        ]);

        flash()->overlay('Has agregado el anexo correctamente', 'Agregar Anexo');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

    public function deleteAnexo($id)
    {
        $data = Anexo::findOrfail($id);
        $data->delete();
        flash()->overlay('Has eliminado anexo correctamente', 'Eliminar Anexo');
        return redirect()->route('personas.agregado',$this->persona->id);
    }

}
