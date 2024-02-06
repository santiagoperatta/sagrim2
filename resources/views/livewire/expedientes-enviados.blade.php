<div>
	<style>
		.expediente-control-previo {
			background-color: #6af857
		}
	</style>
	@if (session()->has('mensaje'))
	<div role="alert" class="w-full mb-6 px-4 py-4 text-base text-gray-500 rounded-lg font-regular">
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
					<p class="">
						Tramite creado por: <strong>{{ $expediente->user->name }}</strong> <br>
						Tramite numero: <strong>{{ $expediente->id }}</strong> 
					</p>
                </div>

					@can('create', App\Models\Expediente::class)
						<div class="p-4 flex gap-3 items-start">
							<button class="text-center bg-gray-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase" disabled>
								ENVIADO
							</button>
						</div>
					@endcan

			</div>
			
	
        @empty
			@cannot('create', App\Models\Expediente::class)
            <p class="p-3 text-center text-sm text-gray-600">No hay expedientes enviados</p>
			@else
			<p class="p-3 text-center text-sm text-gray-600">No hay expedientes enviados aun</p>
			@endcannot
        @endforelse
		
    </div>

    <div class="flex justify-center mt-10 mb-10">
        {{$expedientes->links()}}
    </div>
</div>