@extends('layouts.app')

@section('title', 'Saludo')

@section('content')
<div class="container py-4">
    <h1>Bienvenidos al {{ $colegio }}</h1>

    <h2>Listado de Clientes</h2>
    @if ($clientes->isEmpty())
        <p>No hay clientes registrados.</p>
    @else
        <ul>
            @foreach ($clientes as $cliente)
                <li>{{ $cliente->nombre }} - {{ $cliente->email }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
