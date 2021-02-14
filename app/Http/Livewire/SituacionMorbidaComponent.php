<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SituacionMorbida;

class SituacionMorbidaComponent extends Component
{
    public $modal = false;
    public $editar = false;
    public $confirmSituacionDelete = false;

    public $situacion_id,$nombre;

    public function render()
    {
        return view('livewire.situacion-morbida-component',['situacion' => SituacionMorbida::where('status', 1)->get()]);
    }

    public function modalOpen($id = null)
    {
        if($id){
            $situacion = SituacionMorbida::findOrfail($id);
            $this->nombre = $situacion->nombre;
            $this->situacion_id = $situacion->id;
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
        $this->confirmSituacionDelete = false;
        $this->situacion_id = '';
    }

    public function store(){
        $this->validate([
            'nombre' => 'required|unique:situacion_morbidas',
        ]);
        $create = SituacionMorbida::create([
            'nombre' => $this->nombre,
        ]);

        $this->closeModalAndResetField();
        if($create){
            flash('¡Situación Registrada correctamente!')->success();
            return redirect()->route('situacion-morbida');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('situacion-morbida');
        }
    }

    public function editar(){
        $situacion = SituacionMorbida::findOrfail($this->situacion_id);
        $situacion->nombre = $this->nombre;

        $this->closeModalAndResetField();
        
        if($situacion->save()){
            flash('¡Situación Editada correctamente!')->warning();
            return redirect()->route('situacion-morbida');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('situacion-morbida');
        }
    }

    public function confirmDelete($id){
        $this->confirmSituacionDelete = true;
        $this->situacion_id = $id;
    }

    public function disabled()
    {
        $situacion = SituacionMorbida::findOrfail($this->situacion_id);
        $situacion->status = 0;

        $this->closeModalAndResetField();
        
        if($situacion->save()){
            flash('¡Situación Eliminada correctamente!')->warning();
            return redirect()->route('situacion-morbida');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('situacion-morbida');
        }
    }
}
