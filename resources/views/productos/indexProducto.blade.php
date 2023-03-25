<x-my-layout>
<x-slot name="title">Listado de Tenis</x-slot>
<body>
    <a href="\productos\create">Agregar tenis</a>
    <br><br>
    
    <ul>
        <p>ID | Marca | Modelo | Color | Stock</p>
        @foreach ($productos as $producto)
            <li>
                {{ $producto->id }} |
                {{ $producto->marca }} |
                {{ $producto->modelo }} |
                {{ $producto->color }} |
                {{ $producto->stock }} |
                <a href="\productos\{{ $producto->id }}">Ver</a> | 
                <a href="\productos\{{ $producto->id }}\edit">Editar</a>
            </li>
        @endforeach
    </ul>
</body>
</x-my-layout>