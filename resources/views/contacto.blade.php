@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<section class="bg-gradient-to-r from-purple-900 to-purple-500 text-white py-12 text-center">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Contáctanos</h1>
        <p class="text-lg mb-6">¿Tienes preguntas o deseas más información? ¡Escríbenos o visítanos!</p>
    </div>
</section>
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 max-w-2xl">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="bg-white rounded-lg shadow p-8" method="POST" action="{{ route('contacto.enviar') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="nombre">Nombre</label>
                <input class="w-full px-3 py-2 border rounded" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Correo electrónico</label>
                <input class="w-full px-3 py-2 border rounded" type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="mensaje">Mensaje</label>
                <textarea class="w-full px-3 py-2 border rounded" id="mensaje" name="mensaje" rows="4" required>{{ old('mensaje') }}</textarea>
            </div>
            <button class="bg-purple-900 text-white font-semibold px-6 py-2 rounded hover:bg-purple-700 transition" type="submit">Enviar</button>
        </form>
        <div class="mt-8 text-center">
            <p class="text-gray-700">O escríbenos a <a href="mailto:info@colegioarquitectos.com" class="text-purple-900 font-semibold underline">info@colegioarquitectos.com</a></p>
            <p class="text-gray-700 mt-2">Dirección: Calle Principal #123, Ciudad, País</p>
            <p class="text-gray-700 mt-2">Teléfono: +123 456 7890</p>
        </div>
    </div>
</section>
@endsection 