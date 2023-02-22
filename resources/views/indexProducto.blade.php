<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto - Tenis</title>
</head>
<body>
    <h1>Tenis</h1>
    <ul>
        @foreach ($productos as $producto)
            <li>
                {{ $producto->modelo }}
                {{ $producto->color }}
                {{ $producto->stock }}
            </li>
        @endforeach
    </ul>
</body>
</html>