<?php

namespace App\Http\Controllers;

use App\Models\Organizador;
use Illuminate\Http\Request;

class OrganizadorController extends Controller
{
    // Muestra la lista de organizadores
    public function index()
    {
        $organizadores = Organizador::all();
        return view('organizadores.index', compact('organizadores'));
    }

    // Muestra el formulario para crear un nuevo organizador
    public function create()
    {
        return view('organizadores.create');
    }

    // Guarda un nuevo organizador en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:organizadores,email',
            'telefono' => 'required|string|max:20',
        ]);

        // Crear y guardar el nuevo organizador
        Organizador::create($request->all());

        return redirect()->route('organizadores.index')->with('success', 'Organizador creado con éxito');
    }

    // Muestra el formulario para editar un organizador específico
    public function edit(Organizador $organizador)
    {
        return view('organizadores.edit', compact('organizador'));
    }

    // Actualiza un organizador específico en la base de datos
    public function update(Request $request, Organizador $organizador)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:organizadores,email,' . $organizador->id,
            'telefono' => 'required|string|max:20',
        ]);

        // Actualizar el organizador
        $organizador->update($request->all());

        return redirect()->route('organizadores.index')->with('success', 'Organizador actualizado con éxito');
    }

    // Elimina un organizador específico de la base de datos
    public function destroy(Organizador $organizador)
    {
        $organizador->delete();

        return redirect()->route('organizadores.index')->with('success', 'Organizador eliminado con éxito');
    }
}
