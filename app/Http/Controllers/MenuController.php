<?php

namespace App\Http\Controllers;

use App\Models\Plato;

class MenuController extends Controller
{
    public function index()
    {
        // Orden alfabético según requerimiento
        $platos = Plato::orderBy('nombre', 'asc')->get();
        return view('menu.index', compact('platos'));
    }

    public function show(Plato $plato)
    {
        return view('menu.show', compact('plato'));
    }
}