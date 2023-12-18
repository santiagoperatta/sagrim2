<div class="p-10">
    <div class="p-5 flex">
        <!-- Primera columna -->
        <div class="flex-1 mr-5">
            <div class="mb-5">
                <p>Usuario: <strong>{{ $expediente->user->name }}</strong></p>
                <p>Email: <strong>{{ $expediente->user->email }}</strong></p>
            </div>

            <!-- Información Personal -->
            <div class="mb-5">
                <p class="text-green-600 font-bold">Información Personal:</p>
                <p>Nombre: <strong>{{ $expediente->infoPersonal->nombre }}</strong></p>
                <p>DNI: <strong>{{ $expediente->infoPersonal->dni }}</strong></p>
                <p>Razon Social: <strong>{{ $expediente->infoPersonal->razon_social }}</strong></p>
                <p>Cuit: <strong>{{ $expediente->infoPersonal->cuit }}</strong></p>
            </div>

            <!-- Información del Expediente -->
            <div class="mb-5">
                <p class="text-green-600 font-bold">Información del Expediente:</p>
                <p>Nomenclatura: <strong>{{ $expediente->infoTrabajo->nomenclatura }}</strong></p>
                <p>Numero de Cuenta: <strong>{{ $expediente->infoTrabajo->nro_cuenta }}</strong></p>
                <p>Datos: <strong>{{ $expediente->infoTrabajo->datos }}</strong></p>
                <p>Tipo de Parcela: <strong>{{ $expediente->infoTrabajo->tipo_parcela }}</strong></p>
                <p>Tasa Colegio: <strong>{{ $expediente->infoTrabajo->tasa_colegio }}</strong></p>
            </div>
        </div>

        <!-- Segunda columna -->
		<div class="flex-1">
			<div class="mb-5">
				<p class="text-green-600 font-bold">Honorarios:</p>
				<ul>
					@php
						$totalHonorarios = 0;
					@endphp

					@foreach($expediente->honorarios as $honorario)
						<li><strong>{{ $honorario->articulo }}</strong> - ${{ $honorario->precio }}</li>
						
						@php
							$totalHonorarios += $honorario->precio;
						@endphp
					@endforeach
				</ul>

				<p><strong>TOTAL:</strong> ${{ $totalHonorarios }}</p>
			</div>

			<!-- Archivos PDF -->
			<div class="mb-5">
				@php
				$contadorArchivos = 1;
				@endphp

				@foreach (Storage::files('public/archivos') as $file)
					@if(pathinfo($file, PATHINFO_EXTENSION) == 'pdf')
						<a class="mt-2 inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm
						leading-5 font-medium rounded-full text-gray-700 bg-white hover-bg-gray-50" href="{{ asset('storage/archivos/' . basename($file)) }}" target="_blank">Ver Archivo {{ $contadorArchivos++ }}</a><br>
					@endif
				@endforeach
			</div>
			
			<livewire:crear-numero-expediente
			:expediente_id="$expediente->id" />
		</div>
    </div>
</div>
