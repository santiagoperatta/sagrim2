
    <div class="md:justify-center items-center p-5">
        <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Observaciones') }}
        </h2>
        <div class="max-h-64 overflow-y-auto">
            @forelse ($observacions as $observacion)
                <div class="{{ $observacion->user_id === Auth::id() ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-700' }} rounded-md p-3 mb-2">
                    <p class="text-xs mb-1">{{ $observacion->user->name }} - {{ $observacion->created_at->diffForHumans() }}</p>
                    <p class="text-sm">{{ $observacion->comentario }}</p>
                </div>
            @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay comentarios aún</p>
            @endforelse
        </div>

        <form class="mt-4 space-y-5" wire:submit.prevent='crearObservacion'>
			@if ($expediente->estado == 0)
			<div class="mb-2">
                <x-input-label for="comentario" :value="__('Agregar un comentario')" />
                <x-text-input id="comentario" class="block w-full" type="text" wire:model="comentario" />
                <x-input-error :messages="$errors->get('comentario')" />
            </div>
            <x-primary-button class="mt-4">
                Enviar
            </x-primary-button>
			@endif
        </form>
    </div>