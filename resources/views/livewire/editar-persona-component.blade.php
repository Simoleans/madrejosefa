<div>
    <x-jet-form-section submit="storePersona" class="p-6">
        <x-slot name="title">
            {{ __('Crear Persona') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Debe llenar todos los datos.') }}<br>
            <a class="inline-flex items-center px-2 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-yellow-600 hover:bg-yellow-700" href="{{ route('personas.index') }}">Ver Personas</a>
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="{{ __('Nro. Documento') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="nro_documento" autocomplete="on" />
                <x-jet-input-error for="nro_documento" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="nombres" value="{{ __('Nombres') }}" />
                <x-jet-input type="text" id="nombres" class="mt-1 block w-full" wire:model.defer="nombres" autocomplete="on" />
                <x-jet-input-error for="nombres" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="{{ __('Apellido Paterno') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="apellido_paterno" autocomplete="on" />
                <x-jet-input-error for="apellido_paterno" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="{{ __('Apellido Materno') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="apellido_materno" autocomplete="on" />
                <x-jet-input-error for="apellido_materno" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label value="{{ __('Dirección') }}" />
                <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="direccion" autocomplete="on" />
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label  value="{{ __('Estado civil') }}" />
                <select wire:model.defer="estado_civil" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione...</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
                <x-jet-input-error for="estado_civil" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                <x-jet-input type="date" class="mt-1 block w-full" max="{{  \Carbon\Carbon::today()->format('Y-m-d') }}" wire:model="fecha_nac" wire:change="calculateEdad"/>
                <x-jet-input-error for="fecha_nac" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="fecha_nacimiento" value="{{ __('Edad') }}" />
                <p class="font-bold text-2xl mt-2">{{ $edad }}</p>
            </div>

            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="nivel_instruccion" value="{{ __('Nivel de instrucción') }}" />
                <select wire:model.defer="nivel_instruccion" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                <select wire:model.defer="pais_origen" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
            <hr class="col-span-6 sm:col-span-6">
            @foreach($parentescos as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->persona->nombres }} </p>
                            <p class="text-md font-bold text-gray-700">{{ $p->parentesco }}</p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button type="button" class="bg-green-500 p-2 rounded hover:bg-green-700" wire:click="editParentesco({{ $p->id }})">Editar</x-jet-button>
                            <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteParentesco({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="addParentesco"  type="button" class="block text-center w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Parentesco
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($situacion_m as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->nombre }} </p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="confirmDelete({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="addParentesco"  type="button" class="block text-center w-full bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Situación Morbida
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($situacion_p as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->nombre }} </p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="confirmDelete({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="addParentesco"  type="button" class="block text-center w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Situación Profesional
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            @foreach($situacion_s as $p)
                <div class="col-span-6 sm:col-span-2">
                    <div class="bg-gray-300 shadow-md rounded-md">
                        <div class="flex flex-col justify-center items-center p-2">
                            <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->nombre }} </p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-2">
                            <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="confirmDelete({{ $p->id }})">Eliminar</x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="addParentesco"  type="button" class="block text-center w-full bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Situación Social
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            
            
            <hr class="col-span-6 sm:col-span-6">
            {{-- <div class="col-span-6">
                @foreach ($arrayAnexo as $it => $key)
                    <div class="grid grid-cols-5 gap-4" wire:key="anexo-{{ $key }}">
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label value="{{ __('Foto') }}" />
                            <x-jet-input type="file" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.foto"/>
                            <x-jet-input-error for="anexo.{{ $it }}.foto" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label value="{{ __('Nombre') }}" />
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.nombre"/>
                            <x-jet-input-error for="anexo.{{ $it }}.nombre" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label value="{{ __('Descripción') }}" />
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.descripcion"/>
                            <x-jet-input-error for="anexo.{{ $it }}.descripcion" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label value="{{ __('Fecha de Exp.') }}" />
                            <x-jet-input type="date" max="{{  \Carbon\Carbon::today()->format('Y-m-d') }}" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.fecha_exp"/>
                            <x-jet-input-error for="anexo.{{ $it }}.fecha_exp" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5">
                            <x-jet-label value="{{ __('Eliminar') }}" />
                            <button type="button" class="p-2 rounded bg-red-500 shadow-md" wire:click="deleteAnexo({{ $it }})" >X</button>
                        </div>
                    </div>
                    <hr class="col-span-5 sm:col-span-5 mt-2 mb-2">
                @endforeach
            </div> --}}
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="addAnexo"  type="button" class="block text-center w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Anexo
                </button>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="storeUser">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>

        

    </x-jet-form-section>
    <x-jet-dialog-modal wire:model="editarParentescoModal">
        <x-slot name="title">
            {{ __('Editar Parentesco') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="editarParentescoForm">
                <div class="grid grid-cols-6 gap-6">
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
    </x-jet-dialog-modal>
</div>

