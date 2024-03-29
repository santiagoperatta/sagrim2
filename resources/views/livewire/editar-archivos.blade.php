<div class="md:justify-center items-center p-5">
    <div class="flex items-center space-x-4">
        <div class="{{ $pasoActual === 1 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 1 ? 'text-white' : 'text-gray-500' }}">1</span>
        </div>
        <hr class="border-t border-green-300 mx-2 h-1" />
        <div class="{{ $pasoActual === 2 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 2 ? 'text-white' : 'text-gray-500' }}">2</span>
        </div>
        <hr class="border-t border-green-300 mx-2 h-1" />
        <div class="{{ $pasoActual === 3 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 3 ? 'text-white' : 'text-gray-500' }}">3</span>
        </div>
        <hr class="border-t border-green-300 mx-2 h-1" />
        <div class="{{ $pasoActual === 4 ? 'bg-gradient-to-r from-green-500 to-green-300' : 'bg-gray-300' }} w-10 h-10 rounded-full flex items-center justify-center border-2 border-white">
            <span class="{{ $pasoActual === 4 ? 'text-white' : 'text-gray-500' }}">4</span>
        </div>
    </div>

	<form class="mt-4 md:w-2/3 space-y-5" wire:submit.prevent='editarArchivos'>
        <div class="mb-2">
            <x-input-label for="archivoCaja" :value="__('Boleta de Caja')" />
            <input type="file" name="archivoCaja" wire:model="archivoCaja">
            @error('archivoCaja') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <x-input-label for="archivoInformeVEP" :value="__('Informe - VEP')" />
            <input type="file" name="archivoInformeVEP" wire:model="archivoInformeVEP">
            @error('archivoInformeVEP') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <x-input-label for="lamina1" :value="__('Lamina 1')" />
            <input type="file" name="lamina1" wire:model="lamina1">
            @error('lamina1') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <x-input-label for="lamina2" :value="__('Lamina 2')" />
            <input type="file" name="lamina2" wire:model="lamina2">
            @error('lamina2') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <x-input-label for="lamina3" :value="__('Lamina 3')" />
            <input type="file" name="lamina3" wire:model="lamina3">
            @error('lamina3') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

		<x-primary-button class="mt-4" wire:loading.attr="disabled">
			<span wire:loading wire:target="subirArchivos" class="mr-2">Cargando...</span>
				Subir Archivos
		</x-primary-button>
    </form>
</div>