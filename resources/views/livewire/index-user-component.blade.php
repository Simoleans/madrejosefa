<x-container>
    <livewire:flash-container />
    <div class="flex justify-between">
        <p class="text-2xl font-medium text-gray-900">Usuarios</p>
        <a class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-green-600 hover:bg-green-700" href="{{ route('usuarios.crear') }}">Crear Usuario</a>
    </div>
    <hr class="mb-4">
    <x-jet-label for="search" value="{{ __('Buscar') }}" />
    <x-jet-input type="text" class="mt-1 block w-full" wire:model="search" placeholder="Nombre | Email"/>
    <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-3 mt-6 mb-6">
        
        @foreach($users as $u)
        <div class="bg-gray-300 shadow-md rounded-md">
            <div class="flex flex-col justify-center items-center p-2">
                <p class="text-xl font-bold text-gray-700">{{ $u->name }}</p>
                <p class="text-md font-bold text-gray-700">{{ $u->email }}</p>
                <p class="text-md font-medium text-gray-700">{{ $u->nro_documento ?? 'N/T' }}</p>
                <img src="{{asset('storage/'.$u->firma)}}" alt="{{ $u->email }}" class="w-32 h-32">
            </div>
            <div class="flex justify-end items-center gap-2 p-2">
                <x-jet-button class="bg-green-500 p-2 rounded-md hover:bg-green-700" wire:click="modalEditar({{ $u->id }})">Editar</x-jet-button>
                <x-jet-button class="bg-red-500 p-2 rounded hover:bg-red-700">Eliminar</x-jet-button>
            </div>
        </div>
        @endforeach
        
    </div>
    {{ $users->links() }}
    <x-jet-dialog-modal wire:model="editarUser">
        <x-slot name="title">
            {{ __('Editar Usuario') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="updateData">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label value="{{ __('Nombre') }}" />
                        <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="Name" required />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label value="{{ __('Email') }}" />
                        <x-jet-input type="email" class="mt-1 block w-full" wire:model.defer="email" autocomplete="Email" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label value="{{ __('Nro. Documento') }}" />
                        <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="nro_documento" autocomplete="Documento" />
                        <x-jet-input-error for="nro_documento" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label  value="{{ __('Cargo') }}" />
                        <select wire:model.defer="cargo" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">Seleccione...</option>
                            <option value="0">Administrador</option>
                            <option value="1">Usuario</option>
                        </select>
                        <x-jet-input-error for="cargo" class="mt-2" />
                    </div>
                    <hr class="col-span-6">
                    <p class="text-md col-span-6 font-extrabold">Llenar campos de contraseña si desea cambiar la contraseña</p>
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" autocomplete="new-password" />
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                    <hr class="col-span-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-jet-label value="{{ __('Dirección') }}" />
                        <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="direccion"/>
                        <x-jet-input-error for="direccion" class="mt-2" />
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
</x-container>
