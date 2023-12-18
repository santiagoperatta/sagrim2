<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @forelse ($expedientes as $expediente)
            <div class="mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col sm:flex-row items-start sm:items-center justify-between">
                <div class="p-4 text-gray-900">
                    <a href="{{route('expedientes.show', $expediente->id)}}" class="text-center text-xl font-bold">
                        Numero de expediente: {{ $expediente->nro_expediente }}
                    </a>
					<p class="">
						Expediente creado por: <strong>{{ $expediente->user->name }}</strong>
					</p>
                </div>

				@cannot('create', App\Models\Expediente::class)
					<div class="p-4 flex gap-3 items-start">
						<a href="" class="text-center bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
							Editar
						</a>

						<button
									wire:click="$dispatch('mostrarAlerta', {id: {{$expediente->id}}})"
									class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
									>Eliminar
						</button>
					</div>
				@endcannot

				@can('create', App\Models\Expediente::class)
					<div class="p-4 flex gap-3 items-start">
						<a href="" class="text-center bg-gray-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
							Continuar
						</a>
						
						<a href="" class="text-center bg-green-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
							Enviar
						</a>
					</div>
				@endcan
			</div>
	
        @empty
			@cannot('create', App\Models\Expediente::class)
            <p class="p-3 text-center text-sm text-gray-600">No hay expedientes visados</p>
			@else
			<p class="p-3 text-center text-sm text-gray-600">No hay expedientes creados aun</p>
			@endcannot
        @endforelse
		
    </div>

    <div class="flex justify-center mt-10 mb-10">
        {{$expedientes->links()}}
    </div>
</div>

@push('scripts')
 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
    <script>
 
        document.addEventListener('livewire:initialized', () => {
        @this.on('mostrarAlerta', expedienteId => {
            Swal.fire({
                title: '¿Eliminar este expediente?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {que 
                @this.dispatch('eliminarExpediente', {id: expedienteId});
 
                Swal.fire(
                    'Eliminado!',
                    'El expediente se ha eliminado correctamente',
                    'success'
                )
            }
            })
        });
    });
 
 
 
    </script>
@endpush