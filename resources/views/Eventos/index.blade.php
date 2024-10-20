@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eventos</h1>
    <a href="{{ route('eventos.create') }}" class="btn btn-primary">Crear Evento</a>
    
    <table class="table">
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
            @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->id }}</td>
                <td>{{ $evento->nombre }}</td>
                <td>{{ $evento->descripcion }}</td>
                <td>{{ $evento->fecha_inicio }}</td>
                <td>{{ $evento->fecha_fin }}</td>
                <td>{{ $evento->ubicacion }}</td>
                <td>
                    <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('eventos.destroy', $evento) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
