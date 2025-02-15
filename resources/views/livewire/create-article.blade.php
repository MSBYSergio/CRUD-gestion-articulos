<div>
    <x-button class="mr-8" wire:click="$set('esModalAbierta',true)">Insertar</x-button>
    <x-dialog-modal wire:model="esModalAbierta">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <x-slot name="title">
                <h2 class="text-2xl font-bold mb-6 text-center">Crear Artículo</h2>
            </x-slot>
            <x-slot name="content">
                <!-- Campo Título -->
                <div class="mb-6">
                    <label for="titulo" class="block text-sm font-semibold text-gray-800 mb-2">Título</label>
                    <input type="text" wire:model="form.titulo"
                        id="titulo" name="titulo" placeholder="Escribe un título..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:border-transparent transition duration-300 placeholder-gray-400">
                    <x-input-error for="form.titulo" />
                </div>

                <!-- Campo Contenido -->
                <div class="mb-6">
                    <label for="contenido" class="block text-sm font-semibold text-gray-800 mb-2">Contenido</label>
                    <textarea id="contenido" wire:model="form.contenido" name="contenido" rows="4" placeholder="Escribe el contenido aquí..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:border-transparent transition duration-300 placeholder-gray-400"></textarea>
                    <x-input-error for="form.contenido" />
                </div>

                <!-- Campo Tag -->
                <div class="mb-6">
                    <label for="tag" class="block text-sm font-semibold text-gray-800 mb-2">Categoría</label>
                    <select id="tag" name="tag" wire:model="form.tag"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:border-transparent transition duration-300 text-gray-700">
                        <option selected>Selecciona una opción</option>
                        @foreach ($tags as $item)
                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                        @endforeach
                    </select>
                    <x-input-error for="form.tag" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-center">
                    <button type="submit" wire:click="create" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mr-2">
                        Enviar
                    </button>
                    <button type="submit" wire:click="cancelar" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Cancelar
                    </button>
                </div>
            </x-slot>
        </div>
    </x-dialog-modal>
</div>