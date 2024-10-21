<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Método para mostrar la lista de eventos
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('eventos.create');
    }

    // Método para guardar un nuevo evento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'ubicacion' => 'required|string|max:255',
        ]);

        Evento::create($validatedData);

        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito.');
    }

    // Método para mostrar el formulario de edición de un evento específico
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    // Método para actualizar un evento
    public function update(Request $request, Evento $evento)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'ubicacion' => 'required|string|max:255',
        ]);

        $evento->update($validatedData);

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito.');
    }

    // Método para eliminar un evento
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado con éxito.');
    }
}
