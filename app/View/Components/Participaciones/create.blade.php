@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Participación</h1>
    <form action="{{ route('participaciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="evento_id">Evento ID</label>
            <input type="number" name="evento_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="organizador_id">Organizador ID</label>
            <input type="number" name="organizador_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input type="text" name="rol" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
