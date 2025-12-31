@extends('layouts.main')

@section('title', 'Contacto')

@section('content')
<section class="bg-[#153411] text-white py-12 text-center shadow-lg">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Contáctanos</h1>
        <p class="text-lg mb-6">¿Tienes preguntas o deseas más información? ¡Escríbenos o visítanos!</p>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4 max-w-2xl">

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errores --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULARIO --}}
        <form class="bg-white rounded-lg shadow p-8" method="POST" action="{{ route('contacto.enviar') }}">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nombre">Nombre</label>
        <input class="w-full px-3 py-2 border rounded text-black" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
    </div>

    <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="email">Correo electrónico</label>
    <input class="w-full px-3 py-2 border rounded text-black" type="email" id="email" name="correo" value="{{ old('correo') }}" required>
</div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="mensaje">Mensaje</label>
        <textarea class="w-full px-3 py-2 border rounded text-black" id="mensaje" name="mensaje" rows="4" required>{{ old('mensaje') }}</textarea>
    </div>

    <button class="bg-[#D7A74B] text-[#153411] font-bold px-6 py-2 rounded hover:bg-yellow-600 transition" type="submit">
        Enviar
    </button>
</form>

        {{-- INFORMACIÓN DE CONTACTO --}}
        <div class="mt-8 text-center">

            <p class="text-gray-700">
                📧 Correo:
                <a href="mailto:caeeloro@yahoo.com" class="text-[#153411] font-semibold underline">
                    caeeloro@yahoo.com
                </a>
            </p>

            <p class="text-gray-700 mt-2">
                📍 Dirección:
                Av. Circunvalación Nte., Machala, Ecuador
            </p>

            <p class="text-gray-700 mt-2">
                📞 Celular:
                <a href="tel:+593985244138" class="text-[#153411] font-semibold underline">
                    +593 98 524 4138
                </a>
            </p>

            <div class="mt-4">
                <p class="text-gray-700 font-semibold mb-2">Síguenos en nuestras redes:</p>

                <div class="flex justify-center gap-6 text-[#153411] text-lg font-semibold">
                    <a href="https://www.facebook.com/caeeloro" target="_blank" class="hover:underline">
                        Facebook
                    </a>

                    <a href="https://www.instagram.com/colegiodearquitectoseloro?igsh=NDMyYXc1ZnI4cWlm"
                       target="_blank" class="hover:underline">
                        Instagram
                    </a>

                    {{-- X opcional --}}
                    <span class="opacity-60">
                        X (Próximamente)
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
