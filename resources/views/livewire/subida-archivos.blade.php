<div class="md:justify-center p-5">
    <form class="md:w-2/3 space-y-5" wire:submit.prevent='subirArchivos'>
        <div class="mb-2">
            <x-input-label for="archivoCaja" :value="__('Importe de Caja')" />
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

        <x-primary-button class="mt-4">
            Subir Archivos
        </x-primary-button>
    </form>
</div>