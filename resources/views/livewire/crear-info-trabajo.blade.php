<div class="md:justify-center p-5">
	<form class="md:w-2/3 space-y-5" wire:submit.prevent='crearInfoTrabajo'>
		<div class="mb-2">
			<x-input-label for="nomenclatura" :value="__('Nomenclatura')" />
			<x-text-input id="nomenclatura" class="block w-full" type="text"  wire:model="nomenclatura"/>
			<x-input-error :messages="$errors->get('nomenclatura')"/>
		</div>
		
		<div class="mb-2">
			<x-input-label  for="nro_cuenta" :value="__('Numero de Cuenta')" />
			<x-text-input id="nro_cuenta" class="block w-full" type="text" wire:model="nro_cuenta" placeholder="Numero de Cuenta" :value="old('nro_cuenta')"/>
			<x-input-error :messages="$errors->get('nro_cuenta')"/>
		</div>
		
		<div class="mb-2">
			<x-input-label  for="datos" :value="__('ID Datos')" />
			<x-text-input id="datos" class="block w-full" type="text" wire:model="datos" placeholder="" :value="old('datos')"/>
			<x-input-error :messages="$errors->get('datos')"/>
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
			<x-input-label  for="tasa_colegio" :value="__('Tasa Colegio')" />
			<x-text-input id="tasa_colegio" class="block w-full" type="text" wire:model="tasa_colegio"  :value="old('tasa_colegio')"/>
			<x-input-error :messages="$errors->get('tasa_colegio')"/>
		</div>
	
		<div class="mb-2">
			<x-text-input id="expediente_id" class="block w-full" type="hidden" wire:model="expediente_id" placeholder="ID del Expediente" :value="$expediente_id" />
			<x-input-error :messages="$errors->get('expediente_id')"/>
		</div>
	
	
		<x-primary-button class="mt-4">
			Siguiente
		</x-primary-button>
	</form>
</div>