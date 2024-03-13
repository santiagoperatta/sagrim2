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
                <p class="text-green-600 font-bold">Información del Tramite:</p>
                <p>Nomenclatura: <strong>{{ $expediente->infoTrabajo->nomenclatura }}</strong></p>
                <p>Numero de Cuenta: <strong>{{ $expediente->infoTrabajo->nro_cuenta }}</strong></p>
                <p>Tipo de Parcela: <strong>{{ $expediente->infoTrabajo->tipo_parcela }}</strong></p>
            </div>

			<div class="mb-5">
				<p class="text-green-600 font-bold">Honorarios:</p>
				<ul>
					@php
						$totalHonorarios = 0;
					@endphp

					@foreach($expediente->honorarios as $honorario)
						<li><strong>{{ $honorario->trabajo }}</strong>: ${{ $honorario->valor }}</li>
						
						@php
							$totalHonorarios += $honorario->valor;
						@endphp
					@endforeach
				</ul>

				<p><strong class="text-gray-600">TOTAL:</strong> ${{ $totalHonorarios }}</p>
			</div>
        </div>

        <!-- Segunda columna -->
		<div class="flex-1">
			<!-- Archivos PDF -->
			<p class="text-green-600 font-bold">Archivos:</p>
			<div class="mb-5">
				@php
				$contadorArchivos = 1;
				@endphp

				@foreach (Storage::files('public/archivos/expediente' . $expediente->id) as $file)
					@if(pathinfo($file, PATHINFO_EXTENSION) == 'pdf')
						<a class="mt-2 inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm
						leading-5 font-medium rounded-full text-gray-700 bg-white hover-bg-gray-50" href="{{ asset('storage/archivos/expediente' . $expediente->id . '/' . basename($file)) }}" target="_blank">{{basename($file) }}</a><br>
					@endif
				@endforeach

                <form action="{{ route('descargar-archivos') }}" method="POST">
                    @csrf
                    <input type="hidden" name="expediente_id" value="{{ $expediente->id }}">
                    <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition ease-in-out duration-150">
						<p>Descargar</p><i class="fa-solid fa-download text-white ml-2"></i>
                    </button>
                </form>
			</div>

			<div class="mb-5">
				<livewire:crear-observacion
				:expediente_id="$expediente->id" />
			</div>
		</div>

    </div>
	<livewire:crear-numero-expediente
	:expediente_id="$expediente->id" />
</div>
