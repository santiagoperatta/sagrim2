<div class="md:justify-center items-center p-5">
    <div class="flex items-center space-x-4">
        <div class="{{ $pasoActual === 1 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 1 ? 'text-white' : 'text-gray-500' }}">1</span>
        </div>
        <hr class="border-t border-green-300 mx-2 h-1" />
        <div class="{{ $pasoActual === 2 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 2 ? 'text-white' : 'text-gray-500' }}">2</span>
        </div>
        <hr class="border-t border-green-300 mx-2 h-1" />
        <div class="{{ $pasoActual === 3 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 3 ? 'text-white' : 'text-gray-500' }}">3</span>
        </div>
        <hr class="border-t border-green-300 mx-2 h-1" />
        <div class="{{ $pasoActual === 4 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 4 ? 'text-white' : 'text-gray-500' }}">4</span>
        </div>
    </div>

	<form class="mt-4 md:w-2/3 space-y-5" wire:submit.prevent='crearHonorario'>
		<div class="mb-2">
			<x-text-input id="expediente_id" class="block w-full" type="hidden" wire:model="expediente_id" placeholder="ID del Expediente" :value="$expediente_id" />
			<x-input-error :messages="$errors->get('expediente_id')"/>
		</div>

        <div class="mb-2">
            <x-input-label for="articulo" :value="__('Articulo')" />
            <x-text-input id="articulo" class="block w-full" type="text"  wire:model="articulo"/>
            <x-input-error :messages="$errors->get('articulo')"/>
        </div>

        <div class="mb-2">
            <x-input-label for="precio" :value="__('Precio')" />
            <x-text-input id="precio" class="block w-full" type="text" wire:model="precio" placeholder="Precio"/>
            <x-input-error :messages="$errors->get('precio')"/>
        </div>

        <x-primary-button class="mt-4">
            Agregar Honorario
        </x-primary-button>

		<a href="/subida-archivos/{{$this->expedienteId}}" class="'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4">
            SIGUIENTE
        </a>
    </form>

	@if(count($honorarios) > 0)
		<div class="mt-4">
			<ul>
				@foreach($honorarios as $honorario)
					<li><strong>{{ $honorario['articulo'] }}</strong> - ${{ $honorario['precio'] }}</li>
				@endforeach
			</ul>
		</div>

		<div>
			<p><strong>Aporte previsional a cargo del comitente (9%):</strong> ${{ $aporteComitente }}</p>
			<p><strong>Total de aportes previsionales (18%):</strong> ${{ $totalAportes }}</p>
			<p><strong>Total de honorarios ingresados:</strong> ${{ $totalHonorarios }}</p>
		</div>
	@endif
</div>