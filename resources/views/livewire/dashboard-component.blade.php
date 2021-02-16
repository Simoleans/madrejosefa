<div>
    <div class="grid grid-cols-3 gap-4  px-12 py-5">
        <div class="col-span-3 md:col-span-1 hover:shadow-lg">
            <div class="flex flex-col bg-gray-300 shadow-sm rounded p-4">
                <div class="flex flex-col items-center justify-center flex-shrink-0 h-12 w-full rounded-xl bg-yellow-100 text-yellow-700">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4 items-center pt-2">
                    <div class="text-sm text-gray-500 font-bold">Personas registradas hoy</div>
                    <div class="font-bold text-2xl">{{ $today }}</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 md:col-span-1  hover:shadow-lg">
            <div class="flex flex-col bg-gray-300 shadow-sm rounded p-4">
                <div class="flex flex-col items-center justify-center flex-shrink-0 h-12 w-full rounded-xl bg-red-100 text-red-500">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4 items-center pt-2">
                    <div class="text-sm font-bold text-gray-500">Total - Personas Registradas este mes</div>
                    <div class="font-bold text-2xl">{{ $month }}</div>
                </div>
            </div>
        </div>
        <div class="col-span-3 md:col-span-1  hover:shadow-lg">
            <div class="flex flex-col bg-gray-300 shadow-sm rounded p-4">
                <div class="flex flex-col items-center justify-center flex-shrink-0 h-12 w-full rounded-xl bg-blue-100 text-blue-500">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                </div>
                <div class="flex flex-col flex-grow ml-4 items-center pt-2">
                    <div class="text-sm font-bold text-gray-500">Total - Personas Registradas</div>
                    <div class="font-bold text-2xl">{{ $all }}</div>
                </div>
            </div>
        </div>
    </div>
    <x-container>
        <livewire:flash-container />
        <h2 class="font-bold text-xl mb-4">Bienvenido {{ strtoupper(auth()->user()->name) }} | {{ auth()->user()->email }}</h2>

        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="shadow-md rounded p-4 bg-white flex-1" style="height: 30rem;">
                <livewire:livewire-pie-chart :pie-chart-model="$chartsPais" />
            </div>
            <div class="shadow-md rounded p-4 bg-white flex-1" style="height: 30rem;">
                <livewire:livewire-column-chart :column-chart-model="$chartsEstadocivil" />
            </div>
        </div>
    </x-container>
</div>