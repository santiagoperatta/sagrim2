<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @forelse ($expedientes as $expediente)
            <div class="mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col sm:flex-row items-start sm:items-center justify-between">
                <div class="p-4 text-gray-900">
                    <a target="_blank" href="{{route('expedientes.pdf', $expediente->id)}}" class="text-center text-xl font-bold">
                        Numero de expediente: {{ $expediente->nro_expediente }}
                    </a>
					<p class="">
						Expediente creado por: <strong>{{ $expediente->user->name }}</strong> |
						Fecha del Visado: <strong>{{ $expediente->updated_at }}</strong>
					</p>
                </div>

				@can('create', App\Models\Expediente::class)
					<div class="p-4 flex gap-3 items-start">
						<a href="" class="text-center bg-green-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
							Enviar a CP
						</a>
					</div>
				@endcan
			</div>
			
	
        @empty
			@cannot('create', App\Models\Expediente::class)
            <p class="p-3 text-center text-sm text-gray-600">No hay expedientes visados</p>
			@else
			<p class="p-3 text-center text-sm text-gray-600">No hay tramites creados aun</p>
			@endcannot
        @endforelse
		
    </div>

    <div class="flex justify-center mt-10 mb-10">
        {{$expedientes->links()}}
    </div>
</div>