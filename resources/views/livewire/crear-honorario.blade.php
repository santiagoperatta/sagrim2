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

	<form class="mt-4 md:w-full space-y-5" wire:submit.prevent='crearHonorario'>
		<div class="mb-2">
			<x-text-input id="expediente_id" class="block w-full" type="hidden" wire:model="expediente_id" placeholder="ID del Expediente" :value="$expediente_id" />
			<x-input-error :messages="$errors->get('expediente_id')"/>
		</div>

		<div class="grid grid-cols-2 gap-4">
			<div>
				<div class="mt-1">
					<x-input-label for="superficie" :value="__('Superficie')" />
					<x-text-input id="superficie" class="block mt-1 w-full px-4 py-2" type="text" wire:model.lazy="superficie" :value="old('superficie')" />
					<x-input-error :messages="$errors->get('superficie')" class="mt-2" />
				</div>
			</div>
			<div>
				<div class="mt-1">
					<x-input-label for="superficie_cubierta" :value="__('Superficie Cubierta')" />
					<x-text-input id="superficie_cubierta" class="block mt-1 w-full px-4 py-2" type="text" wire:model.lazy="superficie_cubierta" :value="old('superficie_cubierta')" />
					<x-input-error :messages="$errors->get('superficie_cubierta')" class="mt-2" />
				</div>
			</div>
		</div>
		
		<div class="grid grid-cols-2 gap-4">
			<div class="mt-1">
				<x-input-label for="unidades" :value="__('Unidades')" />
				<x-text-input id="unidades" class="block mt-1 w-full px-4 py-2" type="number" wire:model.lazy="unidades" :value="old('unidades')" />
				<x-input-error :messages="$errors->get('unidades')" class="mt-2" />
			</div>
		
			<div class="mt-1">
				<x-input-label for="plantas" :value="__('Plantas')" />
				<x-text-input id="plantas" class="block mt-1 w-full px-4 py-2" type="number" wire:model.lazy="plantas" :value="old('plantas')" />
				<x-input-error :messages="$errors->get('plantas')" class="mt-2" />
			</div>
		</div>
	
		<div class="grid grid-cols-2 gap-4">
			<div class="mt-1">
				<x-input-label for="nro_lote" :value="__('Numero de Lote')" />
				<x-text-input id="nro_lote" class="block mt-1 w-full px-4 py-2" type="text" wire:model.lazy="nro_lote" :value="old('nro_lote')" />
				<x-input-error :messages="$errors->get('nro_lote')" class="mt-2" />
			</div>

			<div class="mt-1">
				<x-input-label for="valor" :value="__('Valor')" />
				<x-text-input id="valor" class="block mt-1 w-full px-4 py-2" type="text" wire:model.lazy="valor" :value="old('valor')" />
				<x-input-error :messages="$errors->get('valor')" class="mt-2" />
			</div>
		
		</div>
	
		<div class="grid grid-cols-3 gap-4">
			<div class="mt-1">
				<x-input-label for="P" :value="__('P')" />
				<x-text-input id="P" class="block mt-1 w-full px-4 py-2" type="text" wire:model.lazy="P" :value="old('P')" />
				<x-input-error :messages="$errors->get('P')" class="mt-2" />
			</div>
		
			<div class="mt-1">
				<x-input-label for="L" :value="__('L')" />
				<x-text-input id="L" class="block mt-1 w-full px-4 py-2" type="text" wire:model.lazy="L" :value="old('L')" />
				<x-input-error :messages="$errors->get('L')" class="mt-2" />
			</div>
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
					<li><strong>{{ $honorario['superficie'] }}</strong> - ${{ $honorario['valor'] }}</li>
				@endforeach
			</ul>
		</div>

		<div>
			<p><strong>Total de aportes previsionales (18%):</strong> ${{ $totalAportes }}</p>
			<p><strong>Total de honorarios ingresados:</strong> ${{ $totalHonorarios }}</p>
		</div>
	@endif
</div>