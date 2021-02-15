<x-container>
    <livewire:flash-container />
    <h2>Bienvenido {{ strtoupper(auth()->user()->name) }} | {{ auth()->user()->email }}</h2>
</x-container>