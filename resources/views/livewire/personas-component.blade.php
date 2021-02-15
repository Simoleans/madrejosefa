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
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label for="nivel_instruccion" value="{{ __('Tipo de Documento') }}" />
                <select required wire:model.defer="tipo_documento" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione...</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Cédula">Cédula</option>
                </select>
                <x-jet-input-error for="tipo_documento" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label value="{{ __('Nro. Documento') }}" />
                <x-jet-input required type="text" class="mt-1 block w-full" wire:model.defer="nro_documento" autocomplete="on" />
                <x-jet-input-error for="nro_documento" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="nombres" value="{{ __('Nombres') }}" />
                <x-jet-input required type="text" id="nombres" class="mt-1 block w-full" wire:model.defer="nombres" autocomplete="on" />
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
                <x-jet-input required type="text" class="mt-1 block w-full" wire:model.defer="direccion" autocomplete="on" />
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
                <select required wire:model.defer="pais_origen" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($arrayParentesco as $item => $key)
                        <div class="bg-gray-300 shadow-md rounded-md">
                            <div class="flex flex-col justify-center items-center p-2">
                                <p class="text-lg font-extrabold text-gray-700 text-center">{{ $key['name'] }} </p>
                                <p class="text-md font-bold text-gray-700">{{ $key['parentesco'] }}</p>
                            </div>
                            <div class="flex justify-end items-center gap-2 p-2">
                                {{-- <x-jet-button type="button" class="bg-green-500 p-2 rounded hover:bg-green-700" wire:click="editParentesco({{ $p->id }})">Editar</x-jet-button> --}}
                                <x-jet-button type="button" class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="deleteParentesco({{ $item }})">Eliminar</x-jet-button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-6 sm:col-span-6">
                <button  wire:click="modalCreate"  type="button" class="block text-center w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                    Agregar Parentesco
                </button>
            </div>
            <hr class="col-span-6 sm:col-span-6">
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label value="{{ __('Situacion Morbida') }}" />
                <select wire:model.defer="situacion_morbida" multiple class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach($situacion_m as $s)
                        <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="situacion_morbida" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label value="{{ __('Situacion Profesional') }}" />
                <select wire:model.defer="situacion_profesional" multiple class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach($situacion_p as $s)
                        <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="situacion_profesional" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label value="{{ __('Situacion Social') }}" />
                <select wire:model.defer="situacion_social" multiple class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach($situacion_s as $s)
                        <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="situacion_social" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label value="{{ __('Observaciones') }}" />
                <textarea rows="6" type="text"class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="observaciones"></textarea>
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>
            <hr class="col-span-6 sm:col-span-6">
            <div class="col-span-6">
                @foreach ($arrayAnexo as $it => $key)
                    <div class="grid grid-cols-5 gap-4" wire:key="anexo-{{ $key }}">
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label value="{{ __('Foto') }}" />
                            <x-jet-input required type="file" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.foto"/>
                            <x-jet-input-error for="anexo.{{ $it }}.foto" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label required value="{{ __('Nombre') }}" />
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.nombre"/>
                            <x-jet-input-error for="anexo.{{ $it }}.nombre" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label value="{{ __('Descripción') }}" />
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="anexo.{{ $it }}.descripcion"/>
                            <x-jet-input-error for="anexo.{{ $it }}.descripcion" class="mt-2" />
                        </div>
                        <div class="col-span-5 sm:col-span-5" >
                            <x-jet-label required value="{{ __('Fecha de Exp.') }}" />
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
    <x-jet-dialog-modal wire:model="crearParentescoModal">
        <x-slot name="title">
            {{ __('Agregar Parentesco') }}
        </x-slot>
    
        <x-slot name="content">
            <form wire:submit.prevent="addParentesco">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-input-error for="userError" class="mt-2" />
                    </div>
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
                            <select required wire:model.defer="parentesco" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
    </x-jet-dialog-modal>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    window.addEventListener('reset-user', event => { // reset field user
        $(".select2").val(null).trigger('change');
    })
    $(document).ready(function() {
        @this.set('user', '');
        $('.select2').select2();
        $('.select2').on('change', function (e) {
            @this.set('user', e.target.value);
        });
    });
</script>


