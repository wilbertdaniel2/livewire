<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Imagen cargando!</span> Espere hasta que la imagen se haya procesado.
              </div>

            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif

            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" wire:model.defer="title"/>
               <x-jet-input-error for="title" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del post" />
                <textarea wire:model.defer="content" rows="6" class="form-control w-full"></textarea>
                <x-jet-input-error for="content" />
            </div>

            <div>
                <input type="file" wire:model="image">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)" class="mr-2">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.remove wire:target="save">
                Crear post
            </x-jet-danger-button>

            <span wire:loading wire:target="save" class="ml-2">Cargando...</span>
        </x-slot>

    </x-jet-dialog-modal>
</div>
