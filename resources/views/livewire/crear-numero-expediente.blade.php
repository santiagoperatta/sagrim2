<div>
	<form class="flex" wire:submit.prevent="asignarNumeroExpediente">
		<div class="mr-2">
			<x-text-input type="text" id="nro_expediente" placeholder="Agregar Numero de Expediente" name="nro_expediente" wire:model="nro_expediente" />
		</div>
		
		<x-primary-button type="submit" wire:click="asignarNumeroExpediente">
			Asignar
		</x-primary-button>
	</form>

	@if (session()->has('mensaje'))
	<div class="text-green-600 font-bold p-2 my-3">
		{{session('mensaje')}}
	</div>
	@endif
</div>
