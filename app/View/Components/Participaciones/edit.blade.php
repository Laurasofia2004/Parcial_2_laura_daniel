@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Participación</h1>
    <form action="{{ route('participaciones.update', $participacion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="evento_id">Evento</label>
            <select name="evento_id" class="form-control" required>
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}" {{ $participacion->evento_id == $evento->id ? 'selected' : '' }}>
                        {{ $evento->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="organizador_id">Organizador</label>
            <select name="organizador_id" class="form-control" required>
                @foreach($organizadores as $organizador)
                    <option value="{{ $organizador->id }}" {{ $participacion->organizador_id == $organizador->id ? 'selected' : '' }}>
                        {{ $organizador->nombre }} {{ $organizador->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="text" name="rol" class="form-control" value="{{ $participacion->rol }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
