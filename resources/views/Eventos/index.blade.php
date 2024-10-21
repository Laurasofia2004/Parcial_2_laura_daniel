@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
    <div class="container">
        <h1 class="text-center">Eventos</h1>

        <a href="{{ route('eventos.create') }}" class="btn btn-primary mb-3">Crear Evento</a>

        @if ($eventos->isEmpty())
            <p>No hay eventos disponibles.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->descripcion }}</td>
                            <td>{{ $evento->fecha_inicio }}</td>
                            <td>{{ $evento->fecha_fin }}</td>
                            <td>{{ $evento->ubicacion }}</td>
                            <td>
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
