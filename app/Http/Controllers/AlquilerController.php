<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alquileres = Alquiler::with('cliente')->get();
        return view('alquileres.index', compact('alquileres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();

        // Verificar si hay clientes disponibles
        if ($clientes->isEmpty()) {
            return redirect()->route('clientes.index')->with('warning', 'No hay clientes disponibles para registrar un alquiler. Registre un cliente primero.');
        }

        return view('alquileres.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion_pollera' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_entrega',
            'foto_persona' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_persona')) {
            $data['foto_persona'] = $request->file('foto_persona')->store('fotos', 'public');
        }

        Alquiler::create($data);

        return redirect()->route('alquileres.index')->with('success', 'Alquiler registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alquiler = Alquiler::with('cliente')->findOrFail($id);
        return view('alquileres.show', compact('alquiler'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $clientes = Cliente::all();
        return view('alquileres.edit', compact('alquiler', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion_pollera' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_entrega',
            'foto_persona' => 'nullable|image|max:2048'
        ]);

        $alquiler = Alquiler::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto_persona')) {
            // Eliminar la foto existente si existe
            if ($alquiler->foto_persona && Storage::disk('public')->exists($alquiler->foto_persona)) {
                Storage::disk('public')->delete($alquiler->foto_persona);
            }
            $data['foto_persona'] = $request->file('foto_persona')->store('fotos', 'public');
        }

        $alquiler->update($data);

        return redirect()->route('alquileres.index')->with('success', 'Alquiler actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alquiler = Alquiler::findOrFail($id);
        if ($alquiler->foto_persona && Storage::disk('public')->exists($alquiler->foto_persona)) {
            Storage::disk('public')->delete($alquiler->foto_persona);
        }
        $alquiler->delete();

        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado exitosamente.');
    }
}
