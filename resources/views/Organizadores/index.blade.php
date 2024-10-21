@extends('layouts.app')

@section('title', 'Organizadores')

@section('content')
    <div class="container">
        <h1 class="text-center">Organizadores</h1>
        <a href="{{ route('organizadores.create') }}" class="btn btn-primary mb-3">Crear Organizador</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organizadores as $organizador)
                    <tr>
                        <td>{{ $organizador->id }}</td>
                        <td>{{ $organizador->nombre }}</td>
                        <td>{{ $organizador->apellido }}</td>
                        <td>{{ $organizador->email }}</td>
                        <td>{{ $organizador->telefono }}</td>
                        <td>
                            <a href="{{ route('organizadores.edit', $organizador) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('organizadores.destroy', $organizador) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
