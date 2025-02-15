<x-app-layout>
    <x-self.base>
        <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contacto</h2>
            <form action="{{route('contacto.procesar')}}" method="POST">
                @csrf
                <!-- Campo Nombre -->
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        <x-input-error for="nombre"/>
                </div>
                @guest
                <!-- Campo Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="tucorreo@example.com"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        <x-input-error for="email"/>
                </div>
                @endguest
                <!-- Campo Comentarios -->
                <div class="mb-4">
                    <label for="comentarios" class="block text-sm font-medium text-gray-700">Comentarios</label>
                    <textarea id="comentarios" name="comentarios" rows="4" placeholder="Escribe tu mensaje..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"></textarea>
                        <x-input-error for="comentarios"/>
                </div>
                <!-- Botón Enviar -->
                <div class="mt-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 rounded-md shadow-md hover:bg-indigo-700 transition duration-200">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </x-self.base>
</x-app-layout>