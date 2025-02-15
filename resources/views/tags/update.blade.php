<x-app-layout>
    <x-self.base>
        <form action="{{route('tags.update', $tag)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="w-1/2 mx-auto bg-gray-100 p-12 border-2 border-black rounded-2xl">
                <div class="bg-white p-12 rounded-xl shadow-xl">
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Editar una etiqueta</h2>
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="name" value="{{@old('name', $tag -> name)}}" name="name" placeholder="Ej: Tecnología"
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <x-input-error for="name" />
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
                        <textarea id="description" name="description" rows="3" placeholder="Describe la etiqueta..."
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">{{@old('description', $tag -> description)}}</textarea>
                        <x-input-error for="description" />
                    </div>

                    <div class="flex space-x-2 mt-6">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold shadow-md hover:bg-blue-700 transition-all duration-300 active:scale-95">
                            Actualizar
                        </button>
                        <button type="button"
                            class="w-full bg-gray-300 text-gray-800 py-3 rounded-lg font-semibold shadow-md hover:bg-gray-400 transition-all duration-300 active:scale-95">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-self.base>
</x-app-layout>