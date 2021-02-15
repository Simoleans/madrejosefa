<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Personas;
use Livewire\WithPagination;
use App\Exports\PersonasExport;
use Maatwebsite\Excel\Facades\Excel;

class IndexPersonasComponent extends Component
{
    use WithPagination;
    
    public $search = '';
    public $confirmDeletePersona = false;
    public $confirmActivePersona = false;
    public $persona_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.index-personas-component',['personas' => Personas::where('nombres','LIKE',"%{$this->search}%")->OrWhere('nro_documento','LIKE',"%{$this->search}%")->orderby('id','DESC')->paginate(8)]);
    }

    public function closeModalAndResetField()
    {
        $this->confirmDeletePersona = false;
        $this->persona_id = '';
    }

    public function confirmDelete($id){
        $this->confirmDeletePersona = true;
        $this->persona_id = $id;
    }

    public function confirmActive($id)
    {
        $this->confirmActivePersona = true;
        $this->persona_id = $id;
    }

    public function enabled()
    {
        $persona = Personas::findOrfail($this->persona_id);
        $persona->status = 1;

        $this->closeModalAndResetField();
        
        if($persona->save()){
            flash('Persona Habilitada correctamente!')->success();
            return redirect()->route('personas.index');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('personas.index');
        }
    }

    public function disabled()
    {
        $persona = Personas::findOrfail($this->persona_id);
        $persona->status = 0;

        $this->closeModalAndResetField();
        
        if($persona->save()){
            flash('Persona Eliminada correctamente!')->warning();
            return redirect()->route('personas.index');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('personas.index');
        }
    }

    public function editar($id)
    {
        return redirect()->route('personas.editar',$id);
    }

    public function agregados($id){
        return redirect()->route('personas.agregado',$id);
    }

    public function export() 
    {
        return Excel::download(new PersonasExport, 'personas.xlsx');
    }
}
