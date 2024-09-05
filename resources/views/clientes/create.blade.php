@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Registrar Cliente</h2>

        <form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido:</label>
                <input type="text" name="apellido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="edad" class="block text-sm font-medium text-gray-700">Edad:</label>
                <input type="number" name="edad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="dni" class="block text-sm font-medium text-gray-700">DNI:</label>
                <input type="text" name="dni" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div>
                <label for="celular" class="block text-sm font-medium text-gray-700">Celular:</label>
                <input type="text" name="celular" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Registrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
