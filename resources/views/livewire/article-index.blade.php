<div>
    <x-self.base>
        <div class="flex justify-between">
            <div>
                <input type="search" placeholder="Buscar..." wire:model.live="busqueda" class="ml-8 rounded-lg" /> <i class="fa-solid fa-magnifying-glass ml-2"></i>
            </div>
            @livewire('createArticle')
        </div>
        @if (count($articulos))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach ($articulos as $item)
            <article class="relative p-6 rounded-xl shadow-md h-[25rem] flex flex-col justify-between transition-transform transform hover:scale-105 bg-white">
                <div class="text-gray-900 p-3 rounded-t-xl bg-white bg-opacity-90">
                    <h2 class="text-xl font-semibold truncate">{{$item->title}}</h2>
                </div>
                <div class="flex-1 p-3 text-gray-800 rounded-lg overflow-hidden bg-gray-50">
                    <p class="italic line-clamp-3">{{$item->content}}</p>
                </div>
                <div class="mt-2">
                    <span class="block px-3 py-1 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg text-center">
                        {{$item->tag}}
                    </span>
                </div>
                <div class="flex justify-end space-x-3 mt-3">
                    <button wire:click="abrirUpdate({{$item->id}})">
                        <i class="fa-solid fa-pen-to-square text-green-500 text-lg"></i>
                    </button>
                    <button wire:click="avisarDelete({{$item->id}})">
                        <i class="fa-solid fa-trash text-red-500 text-lg"></i>
                    </button>
                </div>
            </article>
            @endforeach
        </div>
        <x-dialog-modal wire:model="openModalUpdate">
            <x-slot name="title">
                Editar artículo
            </x-slot>
            <x-slot name="content">
                <!-- Campo Título -->
                <div class="mb-6">
                    <label for="titulo" class="block text-sm font-semibold text-gray-800 mb-2">Título</label>
                    <input type="text"
                        id="titulo" name="titulo" wire:model="uForm.title"
                        placeholder="Escribe un título..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:border-transparent transition duration-300 placeholder-gray-400">
                    <x-input-error for="uForm.title" />
                </div>

                <!-- Campo Contenido -->
                <div class="mb-6">
                    <label for="content" class="block text-sm font-semibold text-gray-800 mb-2">Contenido</label>
                    <textarea id="content" wire:model="uForm.content"
                        name="content" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:border-transparent transition duration-300 placeholder-gray-400"></textarea>
                    <x-input-error for="uForm.content" />
                </div>

                <!-- Campo Tag -->
                <div class="mb-6">
                    <label for="tag" class="block text-sm font-semibold text-gray-800 mb-2">Categoría</label>
                    <select id="tag" name="tag" wire:model="uForm.tag"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:border-transparent transition duration-300 text-gray-700">
                        @foreach ($tags as $item)
                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                        @endforeach
                    </select>
                    <x-input-error for="uForm.tag" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-center">
                    <button type="submit" wire:click="update" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mr-2">
                        Actualizar
                    </button>
                    <button type="submit" wire:click="salir" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancelar
                    </button>
                </div>
            </x-slot>
        </x-dialog-modal>
        @else
        <div class="w-full   bg-black rounded-lg text-center text-white font-bold mt-2">
            No hemos encontrado ningún artículo o el usuario no tiene ninguno, aproveche para crear uno.
        </div>
        @endif
    </x-self.base>
</div>