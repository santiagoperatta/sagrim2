<div class="flex items-center">
	@can('create', App\Models\Expediente::class)
    <form class="mt-4 w-full max-w-md mx-auto text-center" wire:submit.prevent="crearExpediente">
        <button class="p-3 bg-green-600 text-sm font-bold text-white rounded-lg uppercase">
            NUEVO TRAMITE
        </button>
    </form>
	@endcan
</div>