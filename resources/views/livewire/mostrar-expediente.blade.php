<div class="p-10">
    <div class="p-5">
        <div class="mb-5">
            <p>Usuario: <strong>{{ $expediente->user->name }}</strong></p>
            <p>Email: <strong>{{ $expediente->user->email }}</strong></p>
        </div>

        <!-- Muestra los datos de info_personal -->
		<div class="mb-5">
			<p class="text-green-600 font-bold">Información Personal:</p>
			<p>Nombre: <strong>{{ $expediente->infoPersonal->nombre }}</strong></p>
			<p>DNI: <strong>{{ $expediente->infoPersonal->dni }}</strong></p>
			<p>Razon Social: <strong>{{ $expediente->infoPersonal->razon_social }}</strong></p>
			<p>Cuit: <strong>{{ $expediente->infoPersonal->cuit }}</strong></p>
		</div>


		<div class="mb-5">
			<p class="text-green-600 font-bold">Información del Expediente:</p>
			<p>Nomenclatura: <strong>{{ $expediente->infoTrabajo->nomenclatura }}</strong></p>
			<p>Numero de Cuenta: <strong>{{ $expediente->infoTrabajo->nro_cuenta }}</strong></p>
			<p>Datos: <strong>{{ $expediente->infoTrabajo->datos }}</strong></p>
			<p>Tipo de Parcela: <strong>{{ $expediente->infoTrabajo->tipo_parcela }}</strong></p>
			<p>Tasa Colegio: <strong>{{ $expediente->infoTrabajo->tasa_colegio }}</strong></p>
		</div>
        <!-- Muestra los datos de info_trabajo -->

        <!-- Muestra los datos de honorarios -->
		<div class="mb-5">
			<p class="text-green-600 font-bold">Honorarios:</p>
			<ul>
				@php
					$totalHonorarios = 0;
				@endphp

				@foreach($expediente->honorarios as $honorario)
					<li><strong>{{ $honorario->articulo }}</strong> - ${{ $honorario->precio }}</li>
					<!-- Agrega más campos según la estructura de tu modelo honorarios -->
					
					@php
						$totalHonorarios += $honorario->precio;
					@endphp
				@endforeach
			</ul>

			<p><strong>TOTAL:</strong> ${{ $totalHonorarios }}</p>
		</div>

		@foreach (File::files(public_path('/archivos')) as $file)
			@if(pathinfo($file, PATHINFO_EXTENSION) == 'pdf')
				<a href="{{ asset('/archivos/' . basename($file)) }}" target="_blank">{{ basename($file) }}</a><br>
			@endif
		@endforeach

		@cannot('create', App\Models\Expediente::class)
		<form class="flex" wire:submit.prevent="asignarNumeroExpediente">
			<div class="mr-2">
				<x-text-input type="text" id="numero_expediente" placeholder="Agregar Numero de Expediente" name="numero_expediente" wire:model="numero_expediente" />
			</div>
			
			<x-primary-button type="submit">
				Asignar
			</x-primary-button>
		</form>
		@endcannot
    </div>
</div>