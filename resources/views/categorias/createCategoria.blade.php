<x-my-layout>
    <x-slot name="title">Agregar Categoria</x-slot>
        <form action="\categorias" method="POST">
            @csrf
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br>
            @error('nombre')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button>Guardar</button>
            <br><br><a href="\productos">Regresar a listado de tenis</a>
        </form>
</x-my-layout>