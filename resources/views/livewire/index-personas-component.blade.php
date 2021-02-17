<div x-data="data()">
    <x-container>
        <livewire:flash-container />
        <div class="flex justify-between">
            <p class="text-2xl font-medium text-gray-900">Personas</p>
            <div class="flex justify-end gap-2">
                <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-green-600 hover:bg-green-700" wire:click="export" wire:loading.attr="enabled">Excel</button>
                <a class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-green-600 hover:bg-green-700" href="{{ route('personas.crear') }}">Crear Persona</a>
            </div>
            
        </div>
        <hr class="mb-4">
        <x-jet-label for="search" value="{{ __('Buscar') }}"/>
        <x-jet-input type="text" class="mt-1 block w-full" wire:model="search" placeholder="Nombre | Nro. Documento"/>
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-3 mt-6 mb-6">
            @foreach($personas as $p)
                <div class="bg-gray-300 shadow-md rounded-md">
                    <div class="flex flex-col justify-center items-center p-2">
                        <p class="text-lg font-extrabold text-gray-700 text-center">{{ $p->nombres }} </p>
                        <p class="text-md font-bold text-gray-700">{{ $p->pais_origen }}</p>
                        <p class="text-md font-medium text-gray-700">{{ $p->nro_documento ?? 'Sin documento'}}</p>
                        <p class="text-md font-medium {{ $p->status == 1 ? 'text-green-500' : 'text-red-500' }}">{{ $p->status == 1 ? 'Activo' : 'Inactivo'}}</p>
                    </div>
                    <div class="flex justify-center gap-2 p-2">
                        <x-jet-button class="bg-green-500 p-2 rounded-md hover:bg-green-700" wire:click="editar({{ $p->id }})">Editar</x-jet-button>
                        @if($p->status == 0)
                            <x-jet-button class="bg-purple-500 p-2 rounded hover:bg-purple-700" wire:click="confirmActive({{ $p->id }})">Activar</x-jet-button>
                        @else
                            <x-jet-button title="Eliminar" class="bg-red-600 p-2 rounded hover:bg-red-800" wire:click="confirmDelete({{ $p->id }})">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </x-jet-button>
                        @endif
                    </div>
                    <div class="flex flex-col items-center p-2">
                        <x-jet-button class="bg-yellow-500 p-2 rounded-md hover:bg-yellow-700 text-center" wire:click="agregados({{ $p->id }})">Editar Agregados </x-jet-button>
                        <x-jet-button type="button" title="Imprimir" x-on:click="buttonPrint('{{ route('pdf.persona',encrypt($p->id)) }}')" class="bg-red-500 p-2 mt-2 rounded-md hover:bg-red-700 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                            </svg>
                        </x-jet-button>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $personas->links() }}
        <x-jet-dialog-modal wire:model="confirmDeletePersona">
            <x-slot name="title">
                {{ __('Eliminar Persona') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Estas seguro que deseas ELIMINAR esta persona?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmDeletePersona')" wire:loading.attr="disabled">
                    {{ __('¡No!') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="disabled" wire:loading.attr="disabled">
                    {{ __('Si, Eliminar.') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

        <x-jet-dialog-modal wire:model="confirmActivePersona">
            <x-slot name="title">
                {{ __('Activar Persona') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Estas seguro que deseas ACTIVAR esta persona?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmActivePersona')" wire:loading.attr="enabled">
                    {{ __('¡No!') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="enabled" wire:loading.attr="enabled">
                    {{ __('Si, activar.') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-container>
</div>
<script>
    function data()
    {
        return {
            buttonPrint(url) {
                window.open(url)
            }
        }
    }
</script>
