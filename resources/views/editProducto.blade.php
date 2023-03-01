<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar Producto</h1>
        <form action="{{ route('productos.update', $producto) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ $producto->modelo }}"><br>
            @error('modelo')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <label for="color">Color</label>
            <input type="text" name="color" id="color" value="{{ $producto->color }}"><br>
            @error('color')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <label for="stock">Stock disponible</label>
            <input type="number" name="stock" id="stock" value="{{ $producto->stock }}"><br>
            @error('stock')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button>Guardar</button>
        </form>
        <br><br><a href="{{ route('productos.index') }}">Regresar a listado de tenis</a>
</body>
</html>