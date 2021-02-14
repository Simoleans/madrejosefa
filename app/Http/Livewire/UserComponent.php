<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;


class UserComponent extends Component
{
    use PasswordValidationRules;
    use WithFileUploads;

    public $name,$email,$cargo,$direccion,$nro_documento,$password,$password_confirmation;
    public $firma;
    public function render()
    {
        return view('livewire.user-component');
    }

    public function storeUser(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => $this->passwordRules(),
            'firma' => 'file|max:9024|mimes:png,jpeg', 
        ]);
       
        $create = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'firma' =>  $this->firma->store('users/firma', 'public'),
            'cargo' => $this->cargo,
            'direccion' => $this->direccion,
            'nro_documento' => $this->nro_documento,
            'password' =>  Hash::make($this->password),
        ]);

        if($create){
            flash('¡Usuario Registrado correctamente!')->success();
            return redirect()->route('usuarios.index');
        }else{
            flash('¡Error!')->error();
            return redirect()->route('usuarios');
        }
    }
}
