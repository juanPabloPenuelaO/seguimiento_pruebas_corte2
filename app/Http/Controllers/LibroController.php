<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        return Libro::all();
    }

    public function show($id)
    {
        $libro = Libro::find($id);
        return $libro ? response()->json($libro) : response()->json(['error' => 'No encontrado'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string'
        ]);
        $libro = Libro::create($validated);
        return response()->json($libro, 201);
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);
        if (!$libro)
            return response()->json(null, 404);
        $libro->delete();
        return response()->json(null, 204);
    }

    public function vista()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

}