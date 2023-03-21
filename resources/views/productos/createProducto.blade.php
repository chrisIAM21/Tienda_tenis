<x-my-layout>
    <x-slot name="title">Agregar tenis</x-slot>
    <h1>Agregar Tenis</h1>
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
</x-my-layout>