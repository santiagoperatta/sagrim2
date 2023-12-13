<div class="md:justify-center p-5">
	<div class="flex justify-between p-4">
		<div class="{{ $pasoActual === 1 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-6 h-6 rounded-full flex items-center justify-center border-2 border-white">
			<span class="{{ $pasoActual === 1 ? 'text-white' : 'text-gray-500' }}">1</span>
		</div>
		<div class="{{ $pasoActual === 2 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-6 h-6 rounded-full flex items-center justify-center border-2 border-white">
			<span class="{{ $pasoActual === 2 ? 'text-white' : 'text-gray-500' }}">2</span>
		</div>
		<div class="{{ $pasoActual === 3 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-6 h-6 rounded-full flex items-center justify-center border-2 border-white">
			<span class="{{ $pasoActual === 3 ? 'text-white' : 'text-gray-500' }}">3</span>
		</div>
		<div class="{{ $pasoActual === 4 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-6 h-6 rounded-full flex items-center justify-center border-2 border-white">
			<span class="{{ $pasoActual === 4 ? 'text-white' : 'text-gray-500' }}">4</span>
		</div>
	</div>
	<form class="md:w-2/3 space-y-5" wire:submit.prevent='crearInfoPersonal'>
		<div class="mb-2">
			<x-input-label for="nombre" :value="__('Nombre y Apellido')" />
			<x-text-input id="nombre" class="block w-full" type="text"  wire:model="nombre"/>
			<x-input-error :messages="$errors->get('nombre')"/>
		</div>
		
		<div class="mb-2">
			<x-input-label  for="dni" :value="__('DNI')" />
			<x-text-input id="dni" class="block w-full" type="text" wire:model="dni" placeholder="DNI" :value="old('dni')"/>
			<x-input-error :messages="$errors->get('dni')"/>
		</div>
		
		<div class="mb-2">
			<x-text-input id="expediente_id" class="block w-full" type="hidden" wire:model="expediente_id" placeholder="ID del Expediente" :value="$expediente_id" />
			<x-input-error :messages="$errors->get('expediente_id')"/>
		</div>

		<div class="mb-2">
			<x-input-label  for="razon_social" :value="__('Razon Social')" />
			<x-text-input id="razon_social" class="block w-full" type="text" wire:model="razon_social" placeholder="En caso de ser una empresa" :value="old('razon_social')"/>
			<x-input-error :messages="$errors->get('razon_social')"/>
		</div>
	
		<div class="mb-2">
			<x-input-label  for="cuit" :value="__('CUIT')" />
			<x-text-input id="cuit" class="block w-full" type="text" wire:model="cuit"/>
			<x-input-error :messages="$errors->get('cuit')"/>
		</div>
	
	
		<x-primary-button class="mt-4">
			Siguiente
		</x-primary-button>
	</form>
</div>