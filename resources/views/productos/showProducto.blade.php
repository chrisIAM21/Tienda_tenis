<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle-Producto</title>
</head>
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
</html>