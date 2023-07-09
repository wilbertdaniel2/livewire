<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="px-6 py-4 flex items-center">
                {{-- <input type="text" wire:model="search"> --}}

                <div class="flex items-center">
                    <span>Mostrar</span>

                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span>Entradas</span>
                </div>
                <x-jet-input class="flex-1 mx-4" placeholder="Escriba lo que quiera buscar" type="text" wire:model="search" />
                
                @livewire('create-post')
            </div>

            @if ($posts->count())
                     
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" 
                        class="w-24 px-6 py-3 cursor-pointer"
                        wire:click="order('id')">
                            ID

                            @if ($sort == 'id')

                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                            
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                            
                        </th>
                        <th scope="col" class="px-6 py-3 cursor-pointer"
                        wire:click="order('title')">
                            Title

                            @if ($sort == 'title')

                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                            
                        </th>
                        <th scope="col" class="px-6 py-3 cursor-pointer"
                        wire:click="order('content')">
                            Content

                            @if ($sort == 'content')

                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                            
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->content}}
                        </td>
                        <td class="px-6 py-4">
                            {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                            <a class="btn btn-green" wire:click="edit({{$item}})">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>   
                    
                    @endforeach
                </tbody>
            </table>

            @else

            <div class="px-6 py-4">
                No existe ningun registro coincidente.
            </div>
                
            @endif

            @if ($posts->hasPages())

            <div class="px-6 py-3">
                {{$posts->links()}}
            </div>
                
            @endif

            

        </div>
    </div>


    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            Editar el post
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Imagen cargando!</span> Espere hasta que la imagen se haya procesado.
            </div>

            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">

            @else

                <img src="{{Storage::url($post->image)}}" alt="">

            @endif

            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input wire:model="post.title" type="text" class="w-full" />
            </div>

            <div>
                <x-jet-label value="Contenido del post" />
                <textarea wire:model="post.content" rows="6" class="form-control w-full"></textarea>
            </div>

            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit', false)" class="mr-2">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
