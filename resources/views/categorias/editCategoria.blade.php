<x-my-layout>
    <x-slot name="title">Editar categoria {{ $categoria->nombre }}</x-slot>
        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}"><br>
            @error('nombre')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button>Guardar cambios</button>
        </form>
        <br><br>
        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">ELIMINAR CATEGORIA</button>
        </form>
        <br><hr><br><a href="{{ route('productos.index') }}">Regresar a listado de tenis</a>
</body>
</x-my-layout>