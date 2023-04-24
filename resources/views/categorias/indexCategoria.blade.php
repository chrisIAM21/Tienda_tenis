<x-my-layout>
<x-slot name="title">Categorias</x-slot>
<body>
    <a href="\categorias\create">Agregar categoria</a>
    <br><br>
    
    <ul>
        @foreach ($categorias as $categoria)
            <li>
                {{ $categoria->id }} |
                {{ $categoria->nombre }} |
                <a href="\categorias\{{ $categoria->id }}">Ver</a> | 
                <a href="\categorias\{{ $categoria->id }}\edit">Editar</a>
            </li>
        @endforeach
    </ul>
</body>
</x-my-layout>