@extends('layouts.main')

@section('title', 'Galería')

@section('content')
<section class="py-12 text-center">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8 text-gold">Galería de Imágenes</h1>
        
        <div class="max-w-xl mx-auto mb-12 bg-[#1e4720] border-2 border-gold p-6 rounded-lg shadow-xl">
            <h2 class="text-gold text-xl mb-4 font-semibold">Panel de Administración: Cargar Obra</h2>
            <form action="{{ route('galeria.guardar') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                <input type="file" name="imagen" required class="text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-gold file:text-black hover:file:bg-yellow-600 cursor-pointer">
                <input type="text" name="titulo" placeholder="Nombre de la obra" class="p-2 rounded bg-white text-black border border-gold focus:outline-none focus:ring-2 focus:ring-gold">
                <button type="submit" class="bg-gold text-black font-bold py-2 px-6 rounded hover:bg-yellow-600 transition duration-300">
                    Subir al Portafolio
                </button>
            </form>
        </div>

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