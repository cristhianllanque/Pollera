<!-- resources/views/alquileres/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Registrar Nuevo Alquiler</h2>

        <form action="{{ route('alquileres.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Selección de Cliente -->
            <div>
                <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Descripción de la Pollera -->
            <div>
                <label for="descripcion_pollera" class="block text-sm font-medium text-gray-700">Descripción de la Pollera:</label>
                <input type="text" name="descripcion_pollera" id="descripcion_pollera" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <!-- Fecha de Entrega -->
            <div>
                <label for="fecha_entrega" class="block text-sm font-medium text-gray-700">Fecha de Entrega:</label>
                <input type="date" name="fecha_entrega" id="fecha_entrega" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <!-- Fecha de Devolución -->
            <div>
                <label for="fecha_devolucion" class="block text-sm font-medium text-gray-700">Fecha de Devolución:</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Botón de Envío -->
            <div class="text-center">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Registrar Alquiler</button>
            </div>
        </form>
    </div>
</div>
@endsection
