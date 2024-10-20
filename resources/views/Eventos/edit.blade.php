@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Evento</h1>
    <form action="{{ route('eventos.update', $evento) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $evento->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $evento->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ $evento->fecha_inicio }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha Fin</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ $evento->fecha_fin }}" required>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ $evento->ubicacion }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
