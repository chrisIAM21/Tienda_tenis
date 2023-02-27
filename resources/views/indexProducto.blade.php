<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto - Tenis</title>
</head>
<body>
    <h1>Listado de Tenis</h1>
    <a href="\productos\create">Agregar tenis</a>
    <ul>
        @foreach ($productos as $producto)
            <li>
                {{ $producto->id }}
                {{ $producto->modelo }}
                {{ $producto->color }}
                {{ $producto->stock }}
                <a href="productos\show\{{ $producto->id }}">Ver Detalle</a>
            </li>
        @endforeach
    </ul>
</body>
</html>