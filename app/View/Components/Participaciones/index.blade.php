@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Participaciones</h1>
    <a href="{{ route('participaciones.create') }}" class="btn btn-primary">Crear Participación</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Evento ID</th>
                <th>Organizador ID</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participaciones as $participacion)
            <tr>
                <td>{{ $participacion->evento_id }}</td>
                <td>{{ $participacion->organizador_id }}</td>
                <td>{{ $participacion->rol }}</td>
                <td>
                    <a href="{{ route('participaciones.edit', $participacion) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('participaciones.destroy', $participacion) }}" method="POST" style="display:inline;">
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
