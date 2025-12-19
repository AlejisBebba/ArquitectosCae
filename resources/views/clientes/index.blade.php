@extends('layouts.app')

@section('title', 'Lista de Clientes')
@section('body-class', 'clientes-index')

@section('content')
<div class="container py-4">
    <h1>Lista de Clientes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('clientes.crear') }}" class="btn btn-primary mb-3">Agregar Cliente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>
                        <a href="{{ route('clientes.editar', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('clientes.eliminar', $cliente) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro quieres eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No hay clientes registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
