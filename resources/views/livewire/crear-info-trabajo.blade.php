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

	<form class="mt-4 md:w-2/3 space-y-5" wire:submit.prevent='crearInfoTrabajo'>
		<div class="mb-2">
			<x-input-label for="nomenclatura" :value="__('Nomenclatura Catastral')" />
			<x-text-input id="nomenclatura" class="block w-full" type="text"  wire:model="nomenclatura"/>
			<x-input-error :messages="$errors->get('nomenclatura')"/>
		</div>

		<div class="mb-2">
			<x-input-label  for="nro_cuenta" :value="__('Numero de Cuenta')" />
			<x-text-input id="nro_cuenta" class="block w-full" type="text" wire:model="nro_cuenta" placeholder="Numero de Cuenta" :value="old('nro_cuenta')"/>
			<x-input-error :messages="$errors->get('nro_cuenta')"/>
		</div>

		<div class="mb-2">
            <x-input-label for="tipo_parcela" :value="__('Tipo de Parcela')" />
            <select id="tipo_parcela" class="block w-full border-gray-300 focus:border-green-600 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="tipo_parcela">
				<option value="Rural">--Seleccione una opcion--</option>
				<option value="Rural">Rural</option>
                <option value="Urbana">Urbana</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_parcela')"/>
        </div>
	
		<div class="mb-2">
			<x-text-input id="expediente_id" class="block w-full" type="hidden" wire:model="expediente_id" placeholder="ID del Expediente" :value="$expediente_id" />
			<x-input-error :messages="$errors->get('expediente_id')"/>
		</div>
		
		<a href="/informacion/edit/{{$expedienteId}}" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4">
			Anterior
		</a>
		
		<x-primary-button class="mt-4">
			Siguiente
		</x-primary-button>
		
	</form>
</div>