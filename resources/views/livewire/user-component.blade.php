    <x-jet-form-section submit="storeUser" class="p-6">
        <x-slot name="title">
            {{ __('Crear Usuario') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Debe llenar todos los datos.') }}<br>
            <a class="inline-flex items-center px-2 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-2 bg-yellow-600 hover:bg-yellow-700" href="{{ route('usuarios.index') }}">Ver Usuarios</a>
        </x-slot>
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="current_password" value="{{ __('Nombre') }}" />
                <x-jet-input id="current_password" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="Name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="current_password" value="{{ __('Email') }}" />
                <x-jet-input id="current_password" type="email" class="mt-1 block w-full" wire:model.defer="email" autocomplete="Email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="current_password" value="{{ __('Documento') }}" />
                <x-jet-input id="current_password" type="text" class="mt-1 block w-full" wire:model.defer="nro_documento" autocomplete="Documento" />
                <x-jet-input-error for="documento" class="mt-2" />
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
    
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="password_confirmation" value="{{ __('Repetir Contraseña') }}" />
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="current_password" value="{{ __('Dirección') }}" />
                <x-jet-input id="current_password" type="text" class="mt-1 block w-full" wire:model.defer="direccion"/>
                <x-jet-input-error for="direccion" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
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
