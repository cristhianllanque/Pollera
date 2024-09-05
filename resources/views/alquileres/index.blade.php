@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Lista de Alquileres</h2>
        <a href="{{ route('alquileres.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4 inline-block">Registrar Nuevo Alquiler</a>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Cliente</th>
                    <th class="py-2 px-4 border-b">Descripción Pollera</th>
                    <th class="py-2 px-4 border-b">Fecha Entrega</th>
                    <th class="py-2 px-4 border-b">Fecha Devolución</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alquileres as $alquiler)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $alquiler->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $alquiler->cliente->nombre }}</td>
                    <td class="py-2 px-4 border-b">{{ $alquiler->descripcion_pollera }}</td>
                    <td class="py-2 px-4 border-b">{{ $alquiler->fecha_entrega }}</td>
                    <td class="py-2 px-4 border-b">{{ $alquiler->fecha_devolucion }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('alquileres.show', $alquiler->id) }}" class="text-blue-500">Ver</a>
                        <a href="{{ route('alquileres.edit', $alquiler->id) }}" class="text-yellow-500 ml-2">Editar</a>
                        <form action="{{ route('alquileres.destroy', $alquiler->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
