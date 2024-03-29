<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tramites Pendientes') }}
        </h2>
    </x-slot>

	@if (session()->has('mensaje'))
	<div role="alert" class="w-full mb-6 px-4 py-4 text-base text-gray-500 rounded-lg font-regular">
			<div class="shrink-0 w-1/2">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
				stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round"
				d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
				</path>
			</svg>
			</div>
			<div class="ml-3 mr-12">{{ session('mensaje') }}</div>
		</div>
	@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
					<livewire:mostrar-pendientes/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>