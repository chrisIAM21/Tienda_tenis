<x-admin-layout>
    <x-slot name="title">Archivos</x-slot>
    <x-slot name="breadcrumbs">
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        echo '<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="/">Inicio</a></li>';
        echo '<li class="breadcrumb-item text-sm text-dark active" aria-current="page">' . ucfirst(str_replace('.php', '', $currentPage)) . '</li>';
        ?>
    </x-slot>
    <!-- Mensaje de éxito al subir un archivo -->
    @if (session('archivo') == 'subido')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Producto subido correctamente',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif


    <!-- Tabla para mostrar los archivos -->
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Extensión</th>
                <th>Producto</th>
                <th>Enlazar</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($archivos as $archivo)
                <tr>
                    <td>
                        <!-- La ruta de los archivos es en storage->app->archivos -->
                        <img src="{{ Storage::url($archivo->hash) }}" alt="Imagen del archivo" height="70">
                    </td>
                    <td>{{ $archivo->nombre }}</td>
                    <td>{{ $archivo->extension }}</td>
                    <td>
                        @if ($archivo->producto)
                            {{ $archivo->producto->nombre }}
                        @else
                            Sin enlace
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            @if ($archivo->producto)
                                <form action="{{ route('archivos.desenlazar', $archivo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desenlazar</button>
                                </form>
                            @else
                                <form action="{{ route('archivos.relacionar', $archivo->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <select name="producto_id" class="form-control">
                                            <option value="">Seleccionar producto</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Enlazar producto</button>
                                </form>
                            @endif
                        </div>
                    <td>
                        <div class="form-group">
                            <a href="{{ route('archivos.descargar', $archivo->id) }}"
                                class="btn btn-success btn-sm">Descargar</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            <form action="{{ route('archivos.reemplazar', $archivo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="file" name="archivo" class="form-control-file">
                                </div>
                                <button type="submit" class="btn btn-warning btn-sm">Reemplazar</button>
                            </form>
                        </div>
                    </td>
                    <td>
                            <form action="{{ route('archivos.destroy', $archivo->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón para seleccionar archivo -->
    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="archivo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir Archivo</button>
    </form>


</x-admin-layout>
