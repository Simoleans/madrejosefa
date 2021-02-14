<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Personas;
use Livewire\WithPagination;

class IndexPersonasComponent extends Component
{
    use WithPagination;
    
    public $search = '';
    public $confirmDeletePersona = false;
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
}
