<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Colegio de Arquitectos del Oro')</title>

    {{-- Tailwind + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        body { background-color: #153411; color: #fff; }
        .logo-text { color: #D7A74B !important; }
        .text-gold { color: #D7A74B !important; }
        .bg-gold { background-color: #D7A74B !important; }
        .border-gold { border-color: #D7A74B !important; }
        .main-content { color: #fff; }
        .footer-link { color: #D7A74B !important; }
        .footer-link:hover { color: #fff !important; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Header mejorado -->
    <header class="bg-[#153411] shadow-md sticky top-0 z-50" x-data="{ open: false }">
        <div class="container mx-auto flex justify-between items-center py-4 px-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('imagenes/logo .jpg') }}" alt="Logo Colegio de Arquitectos" class="h-12 w-12 rounded-full bg-white border-4 border-[#D7A74B] shadow-md">
                <span class="text-2xl font-bold text-[#D7A74B]">Colegio de Arquitectos</span>
            </div>
            <!-- Desktop menu -->
            <nav class="hidden md:flex gap-6">
                @php
                    $nav = [
                        ['name' => 'Inicio', 'url' => url('/')],
                        ['name' => 'Servicios', 'url' => url('/servicios')],
                        ['name' => 'Galería', 'url' => url('/galeria')],
                        ['name' => 'Acerca', 'url' => url('/acerca')],
                        ['name' => 'Valores', 'url' => url('/valores')],
                        ['name' => 'Contacto', 'url' => url('/contacto')],
                    ];
                    $current = request()->path();
                @endphp
                @foreach($nav as $item)
                    <a href="{{ $item['url'] }}"
                       class="relative font-semibold px-2 py-1 group transition
                       {{ $current == ltrim(parse_url($item['url'], PHP_URL_PATH), '/') ? 'text-[#D7A74B]' : 'text-white' }}">
                        {{ $item['name'] }}
                        <span class="absolute left-0 -bottom-1 w-full h-0.5 bg-[#D7A74B] scale-x-0 group-hover:scale-x-100 transition-transform origin-left
                            {{ $current == ltrim(parse_url($item['url'], PHP_URL_PATH), '/') ? 'scale-x-100' : '' }}"></span>
                    </a>
                @endforeach
            </nav>
            <!-- Hamburger -->
            <button @click="open = !open" class="md:hidden text-[#D7A74B] focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <!-- Mobile menu -->
        <nav x-show="open" @click.away="open = false" class="md:hidden bg-[#153411] border-t border-[#D7A74B] px-4 pb-4">
            @foreach($nav as $item)
                <a href="{{ $item['url'] }}"
                   class="block py-2 font-semibold text-lg transition
                   {{ $current == ltrim(parse_url($item['url'], PHP_URL_PATH), '/') ? 'text-[#D7A74B]' : 'text-white' }}">
                    {{ $item['name'] }}
                </a>
            @endforeach
        </nav>
    </header>

    <!-- Contenido principal -->
    <main class="flex-1 main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#153411] text-gold py-6 mt-8 border-t border-gold">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-4">
            <div class="mb-2 md:mb-0">
                &copy; {{ date('Y') }} Colegio de Arquitectos del Oro. Todos los derechos reservados.
            </div>
            <div class="space-x-4">
                <a href="#" class="footer-link">Facebook</a>
                <a href="#" class="footer-link">Instagram</a>
                <a href="#" class="footer-link">Twitter</a>
            </div>
        </div>
    </footer>
</body>
</html>
