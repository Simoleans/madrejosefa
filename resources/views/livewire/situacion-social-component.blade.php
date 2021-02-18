<x-container>
    <livewire:flash-container />
    <div class="flex justify-between">
        <p class="text-2xl font-medium text-gray-900">Situación Social</p>
        <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-green-600 hover:bg-green-700" wire:click="modalOpen" >Crear Situación</button>
    </div>
    <hr class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-3 mt-6">
        @foreach($situacion as $s)
            <div class="bg-gray-300 shadow-md rounded-md">
                <div class="flex flex-col justify-center items-center p-2">
                    <p class="text-xl font-bold text-gray-700">{{ $s->nombre }}</p>
                </div>
                <div class="flex justify-end items-center gap-2 p-2">
                    <x-jet-button class="bg-green-500 p-2 rounded-md hover:bg-green-700" wire:click="modalOpen({{ $s->id }})">Editar</x-jet-button>
                    <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="confirmDelete({{ $s->id }})">Eliminar</x-jet-button>
                </div>
            </div>
        @endforeach
    </div>
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if($editar)
            {{ __('Editar Situación') }}
            @else
                {{ __('Crear Situación') }}
            @endif
        </x-slot>

        <x-slot name="content">
            @if($editar)
            <form wire:submit.prevent="editar">
            @else
            <form wire:submit.prevent="store">
            @endif
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="nombre" required />
                        <x-jet-input-error for="nombre" class="mt-2" />
                        <div class="col-span-6 sm:col-span-6 mt-2">
                            <x-jet-label for="nombre" value="{{ __('Observaciones') }}" />
                            <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="observaciones"/>
                        </div>
                    </div>
                </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                @if($editar)
                    {{ __('Editar Situación') }}
                @else
                    {{ __('Crear Situación') }}
                @endif
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="confirmSituacionDelete">
        <x-slot name="title">
            {{ __('Eliminar situación') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estas seguro que deseas eliminar esta situación?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmSituacionDelete')" wire:loading.attr="disabled">
                {{ __('¡No!') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="disabled" wire:loading.attr="disabled">
                {{ __('Si, Eliminar.') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</x-container>
