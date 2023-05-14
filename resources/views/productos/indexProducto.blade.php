<x-admin-layout>
    <x-slot name="title">Listado de Tenis</x-slot>
    <x-slot name="breadcrumb">Productos</x-slot>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Marca</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Modelo</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Color</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Stock</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                <span class="text-secondary text-xs font-weight-bold">{{ $producto->id }}</span>
                                </td>
                            <td>
                                <span class="text-secondary text-xs font-weight-bold">{{ $producto->marca }}</span>
                                </td>
                            <td>
                                <span class="text-secondary text-xs font-weight-bold">{{ $producto->modelo }}</span>
                                </td>
                            <td>
                                <span class="text-secondary text-xs font-weight-bold">{{ $producto->color }}</span>
                                </td>
                            <td>
                                <span class="text-secondary text-xs font-weight-bold">{{ $producto->stock }}</span>
                                </td>
                            <td>
                                <span class="text-secondary text-xs font-weight-bold"><a href="\productos\{{ $producto->id }}">Ver</a></span>
                                <span class="text-secondary text-xs font-weight-bold"><a href="\productos\{{ $producto->id }}\edit">Editar</a></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>