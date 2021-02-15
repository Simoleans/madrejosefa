<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class IndexUserComponent extends Component
{

    use WithPagination;
    
    public $editarUser = false;
    public $search = '';
    public $user_id;

    public $name,$email,$cargo,$direccion,$nro_documento,$password,$password_confirmation;
    public $firma;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.index-user-component',['users' => User::where('name','LIKE',"%{$this->search}%")->where('id','!=',auth()->user()->id)->orderby('id','DESC')->paginate(8)]);
    }

    public function modalEditar($id)
    {
        $user = User::findOrfail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->cargo = $user->cargo;
        $this->direccion = $user->direccion;
        $this->nro_documento = $user->nro_documento;
        $this->user_id = $id;
        $this->editarUser = true;
    }

    public function updateData()
    {
        $user = User::findOrfail($this->user_id);

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'direccion' => 'required',
            'nro_documento' => 'required'
        ]);

        if($this->password != '')
        {
            $this->validate([
                'password' => 'min:8',
            ]);
            $password = Hash::make($this->password);
        }else{
            $password = $user->password;
        }

        $update = $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'cargo' => $this->cargo,
            'direccion' => $this->direccion,
            'nro_documento' => $this->nro_documento,
            'password' =>  $password,
        ]);

        if($update){
            flash('¡Usuario Editado correctamente!')->success();
            return redirect()->route('usuarios.index');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('usuarios');
        }
    }
}
