<x-mail::message>
    # Formulario de Contacto
    Nombre: **{{$nombre}}**
    
    Email: **{{$email}}**
    <x-mail::panel>
        {{$comentarios}}
    </x-mail::panel>
</x-mail::message>