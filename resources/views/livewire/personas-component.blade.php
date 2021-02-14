<x-jet-form-section submit="storeUser" class="p-6">
    <x-slot name="title">
        {{ __('Crear Persona') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Debe llenar todos los datos.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label value="{{ __('Nro. Documento') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="nro_documento" autocomplete="on" />
            <x-jet-input-error for="nro_documento" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label value="{{ __('Nombres') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="on" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label value="{{ __('Apellido Paterno') }}" />
            <x-jet-input type="email" class="mt-1 block w-full" wire:model.defer="apellido_paterno" autocomplete="on" />
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
            <x-jet-input type="date" class="mt-1 block w-full" wire:model="fecha_nac" wire:change="calculateEdad"/>
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
        <div class="col-span-6">
            @foreach ($arrayParentesco as $item => $key)
                <div class="grid grid-cols-6 gap-6" wire:key="parentesco-{{ $key }}">
                    <div class="col-span-6 sm:col-span-2" >
                        <x-jet-label value="{{ __('Persona') }}" />
                        <select wire:model.defer="persona.{{ $item }}.parentesco" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">Seleccione...</option>
                            
                        </select>
                        <x-jet-input-error for="persona_id" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label value="{{ __('Parentesco') }}" />
                        <select wire:model.defer="parentesco.{{ $item }}.parentesco" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label value="{{ __('Eliminar') }}" />
                        <button type="button" class="p-2 rounded bg-red-500 shadow-md" wire:click="deleteParentesco({{ $item }})" >X</button>
                    </div>
                </div>
                <hr class="col-span-5 sm:col-span-5 mt-2 mb-2">
            @endforeach
        </div>
        <div class="col-span-6 sm:col-span-6">
            <button  wire:click="addParentesco"  type="button" class="block text-center w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                Agregar Parentesco
            </button>
        </div>
        <hr class="col-span-6 sm:col-span-6">
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label value="{{ __('Situacion Morbida') }}" />
            <select wire:model.defer="situacion_morbida" multiple class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach($situacion_morbida as $s)
                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="situacion_morbida" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label value="{{ __('Situacion Profesional') }}" />
            <select wire:model.defer="situacion_profesional" multiple class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach($situacion_profesional as $s)
                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="situacion_profesional" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label value="{{ __('Situacion Social') }}" />
            <select wire:model.defer="situacion_social" multiple class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach($situacion_social as $s)
                    <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="situacion_social" class="mt-2" />
        </div>
        <hr class="col-span-6 sm:col-span-6">
        <div class="col-span-6">
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
                        <x-jet-input type="date" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.fecha_exp"/>
                        <x-jet-input-error for="anexo.{{ $it }}.fecha_exp" class="mt-2" />
                    </div>
                    <div class="col-span-5 sm:col-span-5">
                        <x-jet-label value="{{ __('Eliminar') }}" />
                        <button type="button" class="p-2 rounded bg-red-500 shadow-md" wire:click="deleteAnexo({{ $it }})" >X</button>
                    </div>
                </div>
                <hr class="col-span-5 sm:col-span-5 mt-2 mb-2">
            @endforeach
        </div>
        <div class="col-span-6 sm:col-span-6">
            <button  wire:click="addAnexo"  type="button" class="block text-center w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-7">
                Agregar Anexo
            </button>
        </div>
        {{-- <div class="col-span-6 sm:col-span-6">
            <label class="flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-blue-700 w-full">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal">Selecciona tu firma</span>
                <input type='file' wire:model="firma" class="hidden" />
                @if ($firma)
                    Foto:
                    <img class="h-32 w-32 mb-6" src="{{ $firma->temporaryUrl() }}">
                @endif
            </label>
            <x-jet-input-error for="firma" class="mt-2" />
        </div> --}}
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
