<x-my-layout>
<x-slot name="title">Categoría: {{ $categoria->nombre }}</x-slot>
<body>
    <form method="POST" action="{{ route('categorias.agregarProductos', $categoria) }}">
        @csrf
        <label for="producto_id">Agregar producto a la categoría</label>
        <select name="producto_id">
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">
                    {{ $producto->marca }} {{ $producto->modelo }}
                </option>
            @endforeach
        </select>
        <button type="submit">Agregar</button>
    </form>
    <br> <br>
    <hr>

    <a href="\categorias\{{ $categoria->id }}\edit">Editar categoria</a>
    <br><br>
    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">ELIMINAR CATEGORIA</button>
    </form>
    <br><a href="{{ route('productos.index') }}">Regresar a listado de tenis</a>
</body>
</x-my-layout>