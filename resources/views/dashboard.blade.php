<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tramites Pendientes') }}
        </h2>
    </x-slot>

				
	@if (session()->has('mensaje'))
		<div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
			{{session('mensaje')}}
		</div>
	@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
					<livewire:mostrar-expedientes/>
                </div>
            </div>
        </div>
    </div>

	<livewire:crear-expediente/>
</x-app-layout>