<div class="md:justify-center p-5">
    <form class="md:w-2/3 space-y-5" wire:submit.prevent='crearHonorario'>
        <div class="mb-2">
            <x-input-label for="expediente_id" :value="__('ID Expediente')" />
            <x-text-input id="expediente_id" class="block w-full" type="text" wire:model="expediente_id" placeholder="ID del Expediente" :value="old('expediente_id')"/>
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