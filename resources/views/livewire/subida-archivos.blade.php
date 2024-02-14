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

	<form class="mt-4 md:w-2/3 space-y-5" wire:submit.prevent='subirArchivos'>

		<h2 class="text-lg font-semibold">Archivos</h2>
	
		<div class="mb-2">
			<x-input-label for="archivoCaja" :value="__('Boleta de Caja')" />
			<input type="file" name="archivoCaja" wire:model="archivoCaja">
			@error('archivoCaja') <span class="text-red-500">{{ $message }}</span> @enderror
			<span wire:loading wire:target="archivoCaja">Cargando...</span>
			<!-- Botón para ver el archivo -->
			
		</div>
	
		<div class="mb-2">
			<x-input-label for="archivoInformeVEP" :value="__('Informe - VEP (Verificacion Estado Parcelario)')" />
			<input type="file" name="archivoInformeVEP" wire:model="archivoInformeVEP">
			@error('archivoInformeVEP') <span class="text-red-500">{{ $message }}</span> @enderror
			<span wire:loading wire:target="archivoInformeVEP">Cargando...</span>
			<!-- Botón para ver el archivo -->
			
		</div>
	
		<div class="mb-2">
			<x-input-label for="comprobantePago" :value="__('Comprobante de Pago')" />
			<input type="file" name="comprobantePago" wire:model="comprobantePago">
			@error('comprobantePago') <span class="text-red-500">{{ $message }}</span> @enderror
			<span wire:loading wire:target="comprobantePago">Cargando...</span>
			<!-- Botón para ver el archivo -->
			
		</div>
	
		<h2 class="text-lg font-semibold">Laminas</h2>
	
		<div class="mb-2">
			<x-input-label for="lamina1" :value="__('Lamina 1')" />
			<input type="file" name="lamina1" wire:model="lamina1">
			@error('lamina1') <span class="text-red-500">{{ $message }}</span> @enderror
			<span wire:loading wire:target="lamina1">Cargando...</span>
			<!-- Botón para ver el archivo -->
			
		</div>
	
		<div class="mb-2">
			<x-input-label for="lamina2" :value="__('Lamina 2')" />
			<input type="file" name="lamina2" wire:model="lamina2">
			@error('lamina2') <span class="text-red-500">{{ $message }}</span> @enderror
			<span wire:loading wire:target="lamina2">Cargando...</span>
			<!-- Botón para ver el archivo -->

		</div>
	
		<div class="mb-2">
			<x-input-label for="lamina3" :value="__('Lamina 3')" />
			<input type="file" name="lamina3" wire:model="lamina3">
			@error('lamina3') <span class="text-red-500">{{ $message }}</span> @enderror
			<span wire:loading wire:target="lamina3">Cargando...</span>
			<!-- Botón para ver el archivo -->
			
		</div>
	
		<a href="/honorarios/edit/{{$expedienteId}}" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4">
			Anterior
		</a>
	
		<x-primary-button class="mt-4" wire:loading.attr="disabled">
			<span wire:loading wire:target="subirArchivos" class="mr-2">Cargando...</span>
				Subir Archivos
		</x-primary-button>
	</form>

	<script>
		function verArchivo(inputId) {
			const input = document.getElementById(inputId);
			const file = input.files[0];
			
			if (file) {
				const reader = new FileReader();
				reader.onload = function(e) {
					const preview = document.getElementById(inputId + 'Preview');
					preview.innerHTML = `<img src="${e.target.result}" alt="Vista previa" style="max-width: 100px; max-height: 100px;">`;
				}
				reader.readAsDataURL(file);
			} else {
				alert('No se ha seleccionado ningún archivo.');
			}
		}
	</script>
</div>