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
    <x-jet-label for="search" value="{{ __('Buscar') }}" />
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
                        <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="confirmDelete({{ $p->id }})">Eliminar</x-jet-button>
                    @endif
                </div>
                <div class="flex flex-col items-center p-2">
                    <x-jet-button class="bg-yellow-500 p-2 rounded-md hover:bg-yellow-700 text-center" wire:click="agregados({{ $p->id }})">Editar Agregados </x-jet-button>
                    <a class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-green-600 hover:bg-green-700" href="{{ route('pdf.persona',$p->id) }}" target="_blank">PDF </a>
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
