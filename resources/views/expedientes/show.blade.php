<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			Tramite {{$expediente_id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<livewire:mostrar-expediente
				:expediente_id="$expediente_id" />
            </div>
        </div>
    </div>
</x-app-layout>