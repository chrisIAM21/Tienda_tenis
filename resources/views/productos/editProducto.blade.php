<x-layout>
    <x-slot name="title">Editar producto {{ $producto->nombre }}</x-slot>
    <h1>Editar Producto</h1>
        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $producto->nombre }}"><br>
            @error('nombre')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <label for="color">Color: </label>
            <input type="text" name="color" id="color" value="{{ old('color') ?? $producto->color }}"><br>
            @error('color')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <label for="stock">Stock disponible: </label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') ?? $producto->stock }}"><br>
            @error('stock')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button>Guardar cambios</button>
            
        </form>
        <br><br>
        <form action="{{ route('productos.destroy', $producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">ELIMINAR PRODUCTO</button>
        </form>
        <br><hr><br><a href="{{ route('productos.index') }}">Regresar a listado de tenis</a>
</body>
</x-layout>