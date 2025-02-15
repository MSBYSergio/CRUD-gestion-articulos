<x-app-layout>
    <x-self.base>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="flex justify-between">
                <h2 class="text-2xl font-semibold text-gray-800">Lista de Tags</h2>
                <a href="{{route('tags.create')}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-bold rounded-xl text-lg px-6 py-3 shadow-md hover:shadow-lg transition-all duration-300 active:scale-95 mb-2 focus:outline-none">
                    <i class="fa-solid fa-plus mr-2"></i>Insertar
                </a>
            </div>
            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full border-collapse bg-white rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Descripción</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Fecha de Actualización</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($tags as $item)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 text-gray-900 font-medium">{{$item -> name}}</td>
                            @if (is_null($item -> description))
                            <td>
                                <div class="w-full mx-auto text-center bg-black rounded-xl font-bold text-white">
                                    Esta etiqueta no tiene descripción
                                </div>
                            </td>
                            @else
                            <td class="px-6 py-4 text-gray-700">
                                {{$item -> description}}
                            </td>
                            @endif
                            <td class="px-6 py-4 text-gray-500">{{$item -> updated_at -> format('d/m/Y')}}</td>
                            <td class="px-6 py-4 text-gray-700">
                                <form action="{{route('tags.destroy',$item -> id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex justify-evenly">
                                        <button type="submit">
                                            <i class="fa-solid fa-trash text-red-500 hover:text-2xl"></i>
                                        </button>
                                        <a href="{{route('tags.edit', $item -> id)}}">
                                            <i class="fa-solid fa-pen-to-square text-green-500 hover:text-2xl"></i>
                                        </a>
                                    </div>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{$tags -> links()}}
            </div>
        </div>
    </x-self.base>
</x-app-layout>