<x-layout>
<x-slot name="title">Detalles de producto {{ $producto->nombre }}</x-slot>
<body>
    <h1>Detalles de producto</h1>
    <h2>Nombre: </h2><h3>{{ $producto->nombre }}</h3>
    <h2>Color: </h2><h3>{{ $producto->color }}</h3>
    <h2>En stock: </h2><h3>{{ $producto->stock }}</h3>
    <hr>
    <br>
    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">ELIMINAR PRODUCTO</button>
    </form>
    <br><br><a href="{{ route('productos.index') }}">Regresar a listado de tenis</a>
</body>
</x-layout>