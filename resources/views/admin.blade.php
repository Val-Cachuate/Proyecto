<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
<div class="p-3 mb-2 ">
        <h1 class="text-center mb-4">Registro de Admin</h1>
        <p style="text-align: left;">
            <a href="{{ route('altaAdmin') }}">
                <button type="button" class="btn btn-primary">Agregar</button>
            </a>
        </p>
        <table class="table table-striped">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Género</th>
                    <th scope="col">FN</th>
                    <th scope="col">Email</th>
                    <th scope="col">id_rol</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acciones</th>
                </tr>
                @forelse($data as $key => $admin)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $admin['nombre'] .' '. $admin['appat'] .' '. $admin['apmat'] }}</td>
                        <td>{{ $admin['genero'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($admin['fn'])->format('d-m-Y') }}</td>
                        <td>{{ $admin['email'] }}</td>
                        <td>{{ $admin['id_rol'] }}</td>
                        <td>{{ $admin['activo'] == '1' ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('detalleAdmin', $admin['id_admin']) }}" class="btn btn-warning btn-sm">
                               Detalles
                            </a>

                            <a href="{{ route('editarAdmin', $admin['id_admin']) }}" 
                            class="btn btn-success btn-sm">Editar
                            </a>
                            <form action="{{ route('eliminarAdmin', ['id' => $admin['id_admin']]) }}" method="POST"

                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este admin?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>

                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No hay registros disponibles.</td>
                    </tr>
                @endforelse
        </table>
    </div>
</body>
</html>