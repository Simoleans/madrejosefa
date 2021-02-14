<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUserComponent extends Component
{

    use WithPagination;
    
    public $editarUser = false;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.index-user-component',['users' => User::where('name','LIKE',"%{$this->search}%")->orderby('id','DESC')->paginate(8)]);
    }

    public function modalEditar($id)
    {
        $this->editarUser = true;
    }
}
