<?php

use App\Http\Livewire\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PersonasComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\IndexUserComponent;
use App\Http\Livewire\ConfiguracionComponent;
use App\Http\Livewire\SituacionMorbidaComponent;
use App\Http\Livewire\SituacionProfesionalComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    // return view('dashboard');
    Route::get('/dashboard',DashboardComponent::class)->name('dashboard');
    Route::get('crear-usuarios',UserComponent::class)->name('usuarios.crear');
    Route::get('usuarios',IndexUserComponent::class)->name('usuarios.index');
    Route::get('crear-personas',PersonasComponent::class)->name('personas.crear');
    Route::get('configuracion',ConfiguracionComponent::class)->name('configuracion');

    //mini crud
    Route::get('situacion-morbida',SituacionMorbidaComponent::class)->name('situacion-morbida');
    Route::get('situacion-profesional',SituacionProfesionalComponent::class)->name('situacion-profesional');

});
