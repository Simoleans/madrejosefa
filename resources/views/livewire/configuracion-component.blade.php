<div>
    <livewire:flash-container />
    <x-jet-form-section submit="updateData" class="p-6">
        <x-slot name="title">
            {{ __('Configuración del sistema') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Todas las configuraciones del sistema.') }}
        </x-slot>
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="{{ __('Nombre de la fundación') }}" />
                <x-jet-input required maxlength="30" type="text" class="mt-1 block w-full" wire:model.defer="nombre_fundacion"/>
                <x-jet-input-error for="nombre_fundacion" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="{{ __('Número de la fundación') }}" />
                <x-jet-input required type="text" class="mt-1 block w-full" wire:model.defer="numero"/>
                <x-jet-input-error for="numero" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label value="{{ __('Dirección') }}" />
                <x-jet-input required type="text" class="mt-1 block w-full" wire:model.defer="direccion_fundacion"/>
                <x-jet-input-error for="direccion_fundacion" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label value="{{ __('Organización') }}" />
                <x-jet-input required type="text" class="mt-1 block w-full" wire:model.defer="organizacion"/>
                <x-jet-input-error for="organizacion" class="mt-2" />
            </div>
        </x-slot>
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Guardado.') }}
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>

