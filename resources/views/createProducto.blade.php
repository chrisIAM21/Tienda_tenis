d<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Tenis</h1>
        <form action="\productos" method="POST">
            @csrf
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br>
            @error('nombre')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="color">Color</label>
            <input type="text" name="color" id="color" value="{{ old('color') }}"><br>
            @error('color')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="stock">Stock disponible</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"><br>
            @error('stock')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button>Guardar</button>
            <br><br><a href="\productos">Regresar a listado de tenis</a>
        </form>
</body>
</html>