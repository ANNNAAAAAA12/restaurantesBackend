<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Http\Requests\PlatoRequest;
use App\Http\Requests\UpdatePlatoRequest;
use Illuminate\Support\Facades\Storage;

class PlatoController extends Controller
{
    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', compact('platos'));
    }

    public function create()
    {
        return view('platos.crear');
    }

    public function store(PlatoRequest $request)
    {
        $datos = $request->validated();

        if ($request->hasFile('imagen')) {
            // Guarda en storage/app/public/platos/AAAA/MM
            $rutaCarpeta = 'platos/' . date('Y/m');
            $datos['imagen'] = $request->file('imagen')->store($rutaCarpeta, 'public');
        }

        Plato::create($datos);

        return redirect()->route('platos.create')->with('exito', '¡Plato registrado exitosamente!');
    }

    public function edit(Plato $plato)
    {
        return view('platos.editar', compact('plato'));
    }

    public function update(UpdatePlatoRequest $request, Plato $plato)
    {
        $datos = $request->validated();

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen física anterior si existe
            if ($plato->imagen && Storage::disk('public')->exists($plato->imagen)) {
                Storage::disk('public')->delete($plato->imagen);
            }

            // Guardar la nueva en la estructura AAAA/MM
            $rutaCarpeta = 'platos/' . date('Y/m');
            $datos['imagen'] = $request->file('imagen')->store($rutaCarpeta, 'public');
        }

        $plato->update($datos);

        return redirect()->route('platos.index')->with('exito', '¡Plato actualizado correctamente!');
    }

    public function destroy(Plato $plato)
    {
        // Realiza Soft Delete sobre el registro
        $plato->delete();

        return redirect()->route('platos.index')->with('exito', '¡Plato eliminado correctamente!');
    }
    public function menu()
    {
        $platos = Plato::orderBy('nombre', 'asc')->get();
        return view('menu.index', compact('platos'));
    }

    public function detalle(Plato $plato)
    {
        return view('menu.show', compact('plato'));
    }
}