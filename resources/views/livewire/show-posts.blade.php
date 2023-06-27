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
                <x-jet-input class="flex-1 mr-4" placeholder="Escriba lo que quiera buscar" type="text" wire:model="search" />
                
                @livewire('create-post')
            </div>

            @if ($posts->count())
                     
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 cursor-pointer"
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
                    @foreach ($posts as $post)
                        
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$post->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$post->content}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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

        </div>
    </div>
</div>
