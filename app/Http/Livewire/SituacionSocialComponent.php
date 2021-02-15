<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SituacionSocial;

class SituacionSocialComponent extends Component
{
    public $modal = false;
    public $editar = false;
    public $confirmSituacionDelete = false;

    public $situacion_id,$nombre;
    public $observaciones;

    public function render()
    {
        return view('livewire.situacion-social-component',['situacion' => SituacionSocial::where('status', 1)->get()]);
    }

    public function modalOpen($id = null)
    {
        if($id){
            $situacion = SituacionSocial::findOrfail($id);
            $this->nombre = $situacion->nombre;
            $this->situacion_id = $situacion->id;
            $this->observaciones = $situacion->observaciones;
            $this->editar = true;
            $this->modal = true;
        }else{
            $this->editar = false;
            $this->modal = true;
        }
    }

    public function closeModalAndResetField()
    {
        $this->modal = false;
        $this->editar = false;
        $this->nombre = '';
        $this->observaciones = '';
        $this->confirmSituacionDelete = false;
        $this->situacion_id = '';
    }

    public function store(){
        $this->validate([
            'nombre' => 'required|unique:situacion_morbidas',
        ]);
        $create = SituacionSocial::create([
            'nombre' => $this->nombre,
            'observaciones' => $this->observaciones
        ]);

        $this->closeModalAndResetField();
        if($create){
            flash('¡Situación Registrada correctamente!')->success();
            return redirect()->route('situacion-social');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('situacion-social');
        }
    }

    public function editar(){
        $situacion = SituacionSocial::findOrfail($this->situacion_id);
        $situacion->nombre = $this->nombre;
        $situacion->observaciones = $this->observaciones;

        $this->closeModalAndResetField();
        
        if($situacion->save()){
            flash('¡Situación Editada correctamente!')->warning();
            return redirect()->route('situacion-social');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('situacion-social');
        }
    }

    public function confirmDelete($id){
        $this->confirmSituacionDelete = true;
        $this->situacion_id = $id;
    }

    public function disabled()
    {
        $situacion = SituacionSocial::findOrfail($this->situacion_id);
        $situacion->status = 0;

        $this->closeModalAndResetField();
        
        if($situacion->save()){
            flash('¡Situación Eliminada correctamente!')->warning();
            return redirect()->route('situacion-social');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('situacion-social');
        }
    }
}
