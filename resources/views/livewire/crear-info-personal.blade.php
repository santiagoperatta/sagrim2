<div class="md:justify-center p-5">
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
			<x-input-label  for="expediente_id" :value="__('ID Expediente')" />
			<x-text-input id="expediente_id" class="block w-full" type="text" wire:model="expediente_id" placeholder="ID del Expediente" :value="old('expediente_id')"/>
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