@extends('layouts.app')

@section('title', 'Galería')

@section('content')
<section class="py-12 text-center">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8 text-gold">Galería de Imágenes</h1>
        <p class="text-lg mb-10 text-white">Explora algunos de los mejores momentos y espacios de nuestro colegio.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($imagenes as $img)
                <div class="bg-[#1e4720] rounded-lg shadow-lg p-4 flex flex-col items-center transform transition duration-300 hover:scale-105 hover:shadow-2xl border border-gold">
                    <img src="{{ asset('imagenes/' . $img['archivo']) }}" alt="{{ $img['nombre'] }}" class="rounded-lg mb-4 object-cover w-full h-64">
                    <span class="text-gold font-semibold">{{ $img['nombre'] }}</span>
                </div>
            @empty
                <div class="col-span-3 text-white">No hay imágenes en la galería.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
