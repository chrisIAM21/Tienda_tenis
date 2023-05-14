<x-my-layout>
    <x-slot name="title">Detalles de producto {{ $producto->nombre }}</x-slot>

    <body>
        
        <h3>Marca: </h3>
        <h4>{{ $producto->marca }}</h4>
        <h3>Modelo: </h3>
        <h4>{{ $producto->modelo }}</h4>
        <h3>Color: </h3>
        <h4>{{ $producto->color }}</h4>
        <h3>En stock: </h3>
        <h4>{{ $producto->stock }}</h4>
        <hr>
        <a href="\productos\{{ $producto->id }}\edit">Editar producto</a>
        <br><br>
        <form action="{{ route('productos.destroy', $producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">ELIMINAR PRODUCTO</button>
        </form>
        <br><a href="{{ route('productos.index') }}">Regresar a listado de tenis</a>
    </body>
</x-my-layout>
