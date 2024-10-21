<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use App\Models\Evento;
use App\Models\Organizador;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
{
    public function index()
    {
        $participaciones = Participacion::all();
        return view('participaciones.index', compact('participaciones'));
    }

    public function create()
    {
        $eventos = Evento::all();
        $organizadores = Organizador::all();
        return view('participaciones.create', compact('eventos', 'organizadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'organizador_id' => 'required|exists:organizadores,id',
            'rol' => 'required|string|max:255',
        ]);

        Participacion::create($request->all());
        return redirect()->route('participaciones.index')->with('success', 'Participación creada exitosamente.');
    }

    public function edit(Participacion $participacion)
    {
        $eventos = Evento::all();
        $organizadores = Organizador::all();
        return view('participaciones.edit', compact('participacion', 'eventos', 'organizadores'));
    }

    public function update(Request $request, Participacion $participacion)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'organizador_id' => 'required|exists:organizadores,id',
            'rol' => 'required|string|max:255',
        ]);

        $participacion->update($request->all());
        return redirect()->route('participaciones.index')->with('success', 'Participación actualizada exitosamente.');
    }

    public function destroy(Participacion $participacion)
    {
        $participacion->delete();
        return redirect()->route('participaciones.index')->with('success', 'Participación eliminada exitosamente.');
    }
}
