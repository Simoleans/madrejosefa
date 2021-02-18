<div>
    <livewire:flash-container />
    <x-jet-form-section submit="storePersona" class="p-6">
        <x-slot name="title">
            {{ __('Agregado Persona') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Debe llenar todos los datos.') }}<br>
            <a class="inline-flex items-center px-2 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-yellow-600 hover:bg-yellow-700" href="{{ route('personas.index') }}">Ver Personas</a>
        </x-slot>

        <x-slot name="form">
            @foreach($parentescos as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->nombres }} </p>
                            <p class="text-md font-bold text-gray-700">{{ $p->parentesco }}</p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button type="button" class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteParentesco({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="modalCreate"  type="button" class="block text-center w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Parentesco
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($this->persona->s_morbida as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->situacion->nombre }} </p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button type="button" class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteSituacionMorbida({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="modalCreateSituacionMorbida"  type="button" class="block text-center w-full bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Situación Morbida
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($this->persona->s_profesional as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->situacion->nombre }} </p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button type="button" class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteSituacionProfesional({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="modalCreateSituacionProfesional"  type="button" class="block text-center w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Situación Profesional
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($this->persona->s_social as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->situacion->nombre }} </p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button type="button" class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteSituacionSocial({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="modalCreateSituacionSocial"  type="button" class="block text-center w-full bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Situación Social
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($this->persona->anexos as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->nombre }} </p>
                            <p class="text-md font-bold text-gray-700 text-center">{{ $p->fecha_exp }} </p>
                            <img src="{{ asset('storage/'.$p->foto) }}" alt="{{ $p->nombre }}" class="h-32 w-32">
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button type="button" class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteAnexo({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="modalCreateAnexo"  type="button" class="block text-center w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Anexo
                </button>
            </div>
        </x-slot>

    </x-jet-form-section>
    {{-- <x-jet-dialog-modal wire:model="editarParentescoModal">
        <x-slot name="title">
            {{ __('Editar Parentesco') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="editarParentescoForm">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Persona') }}" />
                            <select required wire:model="user" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                @foreach($personas as $p)
                                    <option value="{{ $p->id }}" {{ $persona->id == $p->user_id ? 'selected' : '' }}>{{ $p->situacion->nombres }}</option>
                                @endforeach
                            </select>
                        <x-jet-input-error for="parentesco" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Parentesco') }}" />
                            <select required wire:model="parentesco" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                <option value="Conyugue o Pareja">Conyugue o Pareja</option>
                                <option value="Hijo de ambos">Hijo de ambos</option>
                                <option value="Hijo del conyugue">Hijo del conyugue</option>
                                <option value="Padre o Madre">Padre o Madre</option>
                                <option value="Suegro o Suegra">Suegro o Suegra</option>
                                <option value="Yerno o Nuera">Yerno o Nuera</option>
                                <option value="Cuñado o Cuñada">Cuñado o Cuñada</option>
                                <option value="Otro">Otro</option>
                            </select>
                        <x-jet-input-error for="parentesco" class="mt-2" />
                    </div>
                </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editarParentescoModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Editar Parentesco') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal> --}}

   {{--  <x-jet-dialog-modal wire:model="crearParentescoModal">
        <x-slot name="title">
            {{ __('Agregar Parentesco') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="agregarParentescoForm">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6" wire:ignore>
                        <x-jet-label value="{{ __('Persona') }}" />
                            <select  style="width : 100% !important; padding" class="select2 mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                @foreach($personas as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombres }} | {{ $p->nro_documento }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Parentesco') }}" />
                            <select required wire:model="parentesco" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                <option value="Conyugue o Pareja">Conyugue o Pareja</option>
                                <option value="Hijo de ambos">Hijo de ambos</option>
                                <option value="Hijo del conyugue">Hijo del conyugue</option>
                                <option value="Padre o Madre">Padre o Madre</option>
                                <option value="Suegro o Suegra">Suegro o Suegra</option>
                                <option value="Yerno o Nuera">Yerno o Nuera</option>
                                <option value="Cuñado o Cuñada">Cuñado o Cuñada</option>
                                <option value="Otro">Otro</option>
                            </select>
                        <x-jet-input-error for="parentesco" class="mt-2" />
                    </div>
                </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('crearParentescoModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Agregar Parentesco') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal> --}}

    <x-jet-dialog-modal wire:model="crearParentescoModal">
        <x-slot name="title">
            {{ __('Agregar Parentesco') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="agregarParentescoForm">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-input-error for="userError" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="nivel_instruccion" value="{{ __('Tipo de Documento') }}" />
                <select required wire:model.defer="tipo_documento_paren" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione...</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Cédula">Cédula</option>
                    <option value="Sin documento">Sin documento</option>
                </select>
                <x-jet-input-error for="tipo_documento" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="{{ __('Nro. Documento') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="nro_documento_paren" autocomplete="on" />
                <x-jet-input-error for="nro_documento" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="nombres" value="{{ __('Nombres') }}" />
                <x-jet-input required type="text" id="nombres" class="mt-1 block w-full" wire:model.defer="nombres_paren" autocomplete="on" />
                <x-jet-input-error for="nombres" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="{{ __('Apellido Paterno') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="apellido_paterno_paren" autocomplete="on" />
                <x-jet-input-error for="apellido_paterno" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="{{ __('Apellido Materno') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="apellido_materno_paren" autocomplete="on" />
                <x-jet-input-error for="apellido_materno" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label value="{{ __('Dirección') }}" />
                <x-jet-input required type="text" class="mt-1 block w-full" wire:model.defer="direccion_paren" autocomplete="on" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label  value="{{ __('Estado civil') }}" />
                <select wire:model.defer="estado_civil_paren" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione...</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
                <x-jet-input-error for="estado_civil" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input type="date" class="mt-1 block w-full" max="{{  \Carbon\Carbon::today()->format('Y-m-d') }}" wire:model="fecha_nac_paren"/>
                <x-jet-input-error for="fecha_nac" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="nivel_instruccion" value="{{ __('Nivel de instrucción') }}" />
                <select wire:model.defer="nivel_instruccion_paren" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione...</option>
                    <option value="Ninguno">Ninguno</option>
                    <option value="Educación Parvulario">Educación Parvulario</option>
                    <option value="Educación básica">Educación básica</option>
                    <option value="Educación media humanista">Educación media humanista</option>
                    <option value="Educación media técnico profesional">Educación media técnico profesional</option>
                    <option value="Formación técnica incompleta">Formación técnica incompleta</option>
                    <option value="Instituto profesional incompleto">Instituto profesional incompleto</option>
                    <option value="Instituto profesional completo">Instituto profesional completo</option>
                    <option value="Educación universitaria incompleta">Educación universitaria incompleta</option>
                    <option value="Educación universitaria completa">Educación universitaria completa</option>
                    <option value="Postgrado">Postgrado</option>
                </select>
                <x-jet-input-error for="nivel_instruccion" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="pais_origen" value="{{ __('País de origen') }}" />
                <select required wire:model.defer="pais_origen_paren" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione...</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Chile">Chile</option>
                    <option value="Perú">Perú</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Haití">Haití</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Otro">Otro</option>
                </select>
                <x-jet-input-error for="pais_origen" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6 mb-2">
                <x-jet-label value="{{ __('Parentesco') }}" />
                    <select required wire:model="parentesco" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione...</option>
                        <option value="Conyugue o Pareja">Conyugue o Pareja</option>
                        <option value="Hijo de ambos">Hijo de ambos</option>
                        <option value="Hijo del conyugue">Hijo del conyugue</option>
                        <option value="Padre o Madre">Padre o Madre</option>
                        <option value="Suegro o Suegra">Suegro o Suegra</option>
                        <option value="Yerno o Nuera">Yerno o Nuera</option>
                        <option value="Cuñado o Cuñada">Cuñado o Cuñada</option>
                        <option value="Otro">Otro</option>
                    </select>
                <x-jet-input-error for="parentesco" class="mt-2" />
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('crearParentescoModal')" wire:loading.attr="agregarParentescoForm">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="agregarParentescoForm">
                {{ __('Agregar Parentesco') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="crearSituacionMorbidaModal">
        <x-slot name="title">
            {{ __('Agregar Situación Morbida') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="agregarSituacionMorbidaform">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Situación Morbida') }}" />
                            <select required wire:model="situacion_morbida" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                @foreach($situacion_m as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            </select>
                        <x-jet-input-error for="exists" class="mt-2" />
                    </div>
                </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('crearSituacionMorbidaModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Agregar Situación') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="crearSituacionProfesionalModal">
        <x-slot name="title">
            {{ __('Agregar Situación Profesional') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="agregarSituacionProfesionalform">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Situación Profesional') }}" />
                            <select required wire:model="situacion_profesional" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                @foreach($situacion_p as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            </select>
                        <x-jet-input-error for="exists" class="mt-2" />
                    </div>
                </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('crearSituacionProfesionalModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Agregar Situación') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="crearSituacionSocialModal">
        <x-slot name="title">
            {{ __('Agregar Situación Social') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="agregarSituacionSocialform">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Situación Social') }}" />
                            <select required wire:model="situacion_social" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione...</option>
                                @foreach($situacion_s as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            </select>
                        <x-jet-input-error for="exists" class="mt-2" />
                    </div>
                </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('crearSituacionSocialModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Agregar Situación') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="crearAnexoModal">
        <x-slot name="title">
            {{ __('Agregar Anexo') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="agregarAnexoform">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-5 sm:col-span-5" >
                        <x-jet-label value="{{ __('Foto') }}" />
                        <x-jet-input type="file" class="mt-1 block w-full" wire:model.defer="foto"/>
                        <x-jet-input-error for="foto" class="mt-2" />
                    </div>
                    <div class="col-span-5 sm:col-span-5" >
                        <x-jet-label value="{{ __('Nombre') }}" />
                        <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="nombre"/>
                        <x-jet-input-error for="nombre" class="mt-2" />
                    </div>
                    <div class="col-span-5 sm:col-span-5" >
                        <x-jet-label value="{{ __('Descripción') }}" />
                        <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="descripcion"/>
                        <x-jet-input-error for="descripcion" class="mt-2" />
                    </div>
                    <div class="col-span-5 sm:col-span-5" >
                        <x-jet-label value="{{ __('Fecha de Exp.') }}" />
                        <x-jet-input type="date" max="{{  \Carbon\Carbon::today()->format('Y-m-d') }}" class="mt-1 block w-full" wire:model.defer="fecha_exp"/>
                        <x-jet-input-error for="fecha_exp" class="mt-2" />
                    </div>
                </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('crearAnexoModal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Agregar Anexo') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        @this.set('user', '');
        $('.select2').select2();
        $('.select2').on('change', function (e) {
            @this.set('user', e.target.value);
        });
    });
</script>


