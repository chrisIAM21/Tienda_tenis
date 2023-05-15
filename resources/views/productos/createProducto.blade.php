<x-admin-layout>
    <x-slot name="title">Agregar tenis</x-slot>
    <x-slot name="breadcrumbs">
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        echo '<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/">Inicio</a></li>';
        echo '<li class="breadcrumb-item text-sm text-dark active" aria-current="page">' . ucfirst(str_replace('.php', '', $currentPage)) . '</li>';
        ?>
    </x-slot>
    <div class="card-body px-5 pt-2 pb-2">
        <form action="\productos" method="POST">
            @csrf
            <label for="marca">Marca: </label>
            <input class="form-control w-30" type="text" name="marca" id="marca" value="{{ old('marca') }}"><br>
            @error('marca')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="modelo">Modelo: </label>
            <input class="form-control w-30" type="text" name="modelo" id="modelo" value="{{ old('modelo') }}"><br>
            @error('modelo')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="color">Color: </label>
            <input class="form-control w-30" type="text" name="color" id="color" value="{{ old('color') }}"><br>
            @error('color')
                <h4>*{{$message}}</h4>
            @enderror
            <br>

            <label for="stock">Stock disponible: </label>
            <input class="form-control w-30" type="number" name="stock" id="stock" value="{{ old('stock') }}"><br>
            @error('stock')
                <h4>*{{$message}}</h4>
            @enderror
            <br>
            <button class="btn btn-white btn-sm w-20 mb-0">Guardar</button>
        </form>
    </div>
</x-admin-layout>