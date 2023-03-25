<x-my-layout>
    <x-slot name="title">Agregar tenis</x-slot>
        <form action="\productos" method="POST">
            @csrf
            <label for="marca">Marca: </label>
            <input type="text" name="marca" id="marca" value="{{ old('marca') }}"><br>
            @error('marca')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="modelo">Modelo: </label>
            <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}"><br>
            @error('modelo')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="color">Color: </label>
            <input type="text" name="color" id="color" value="{{ old('color') }}"><br>
            @error('color')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="stock">Stock disponible: </label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"><br>
            @error('stock')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button>Guardar</button>
            <br><br><a href="\productos">Regresar a listado de tenis</a>
        </form>
</x-my-layout>