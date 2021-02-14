<x-jet-form-section submit="updatePassword" class="p-6">
    <x-slot name="title">
        {{ __('Configuración del sistema') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Todas las configuraciones del sistema.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="current_password" value="{{ __('Nombre de la fundación') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="current_password" value="{{ __('Número de la fundación') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="current_password" value="{{ __('Dirección') }}" />
            <x-jet-input id="current_password" type="text" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="current_password" value="{{ __('Organización') }}" />
            <x-jet-input id="current_password" type="text" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

