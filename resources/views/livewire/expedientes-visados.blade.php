<div>
	<style>
		.expediente-control-previo {
			background-color: #6af857
		}
	</style>
	@if (session()->has('mensaje'))
	<div role="alert" class="w-full mb-6 px-4 py-4 text-base text-white bg-gray-900 rounded-lg font-regular">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
			stroke="currentColor" class="w-6 h-6">
			<path stroke-linecap="round" stroke-linejoin="round"
			d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
			</path>
		</svg>
		{{ session('mensaje') }}
	</div>
	@endif
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

                @if ($expediente->controlprevio == 1)
					@can('create', App\Models\Expediente::class)
						<div class="p-4 flex gap-3 items-start">
							<button class="text-center bg-gray-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase" disabled>
								EN CONTROL
							</button>
						</div>
					@endcan
                @else
                    @can('create', App\Models\Expediente::class)
                        <div class="p-4 flex gap-3 items-start">
                            <a href="#" wire:click="enviarControlPrevio({{ $expediente->id }})" class="text-center bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                                Enviar a CP
                            </a>
                        </div>
                    @endcan
                @endif
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