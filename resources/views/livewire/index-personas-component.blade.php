<x-container>
    <livewire:flash-container />
    <div class="flex justify-between">
        <p class="text-2xl font-medium text-gray-900">Personas</p>
        <a class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-green-600 hover:bg-green-700" href="{{ route('personas.crear') }}">Crear Persona</a>
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
                    <p class="text-md font-medium text-gray-700">{{ $p->nro_documento}}</p>
                    <p class="text-md font-medium {{ $p->status == 1 ? 'text-green-500' : 'text-red-500' }}">{{ $p->status == 1 ? 'Activo' : 'Inactivo'}}</p>
                </div>
                <div class="flex justify-center gap-2 p-2">
                    <x-jet-button class="bg-green-500 p-2 rounded-md hover:bg-green-700" wire:click="editar({{ $p->id }})">Editar</x-jet-button>
                    <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700" wire:click="confirmDelete({{ $p->id }})">Eliminar</x-jet-button>
                </div>
                <div class="flex flex-col items-center p-2">
                    <x-jet-button class="bg-yellow-500 p-2 rounded-md hover:bg-yellow-700 text-center" wire:click="agregados({{ $p->id }})">Editar Agregados </x-jet-button>
                </div>
            </div>
        @endforeach
    </div>
    {{ $personas->links() }}
    <x-jet-dialog-modal wire:model="editarUser">
        <x-slot name="title">
            {{ __('Editar Usuario') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="editar">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="current_password" value="{{ __('Nombre') }}" />
                        <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="name" autocomplete="Name" required />
                        <x-jet-input-error for="current_password" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="current_password" value="{{ __('Email') }}" />
                        <x-jet-input id="current_password" type="email" class="mt-1 block w-full" wire:model.defer="email" autocomplete="Email" />
                        <x-jet-input-error for="current_password" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="current_password" value="{{ __('Documento') }}" />
                        <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="nro_documento" autocomplete="Documento" />
                        <x-jet-input-error for="current_password" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="current_password" value="{{ __('Cargo') }}" />
                        <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="cargo"/>
                        <x-jet-input-error for="current_password" class="mt-2" />
                    </div>
            
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
            
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="password_confirmation" value="{{ __('Repetir Contraseña') }}" />
                        <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                        <x-jet-input-error for="password_confirmation" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="current_password" value="{{ __('Dirección') }}" />
                        <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="direccion"/>
                        <x-jet-input-error for="current_password" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label class="flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-blue-700 w-full">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Selecciona tu firma</span>
                            <input type='file' class="hidden" accept="image/png, image/jpeg" />
                        </label>
                    </div>
                </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editarUser')" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 bg-green-500" type="submit" wire:loading.attr="disabled">
                {{ __('Editar Usuario') }}
            </x-jet-button>
        </form>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="confirmDeletePersona">
        <x-slot name="title">
            {{ __('Eliminar Persona') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estas seguro que deseas eliminar esta persona?') }}
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
</x-container>
