<x-my-layout>
    <x-slot name="title">Editar producto {{ $producto->nombre }}</x-slot>
        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="marca">Marca: </label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') ?? $producto->marca }}"><br>
            @error('marca')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <label for="modelo">Modelo: </label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') ?? $producto->modelo }}"><br>
            @error('modelo')
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
</x-my-layout>