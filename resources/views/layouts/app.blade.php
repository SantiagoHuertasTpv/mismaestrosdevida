<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS MAESTROS DE VIDA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)),
            url("{{ asset('images/portada.png') }}");
            background-size: cover;
            background-position: 50% 20%;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-black min-h-screen flex flex-col bg-custom-image">

  <nav class="w-full bg-black/40 backdrop-blur-md border-b border-white/10 p-4 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto flex flex-wrap justify-between items-center">
        <a href="{{ route('home') }}" class="text-amber-500 font-black tracking-tighter text-xl uppercase">
        Maestros de Vida
    </a>
        
        <div class="flex space-x-6 items-center">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors text-sm uppercase font-bold">Inicio</a>
            <a href="{{ route('comentarios.create') }}" class="text-gray-300 hover:text-white transition-colors text-sm uppercase font-bold">Tu Maestro</a>
            <a href="{{ route('pedido.create') }}" class="text-gray-300 hover:text-white transition-colors text-sm uppercase font-bold">Pedir Libro</a>
            <a href="https://wa.me/34687721447" target="_blank" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-full text-xs font-bold uppercase transition-all shadow-lg">
                WhatsApp
            </a>
        </div>
    </div>
</nav>

    <main class="flex-grow flex flex-col items-center justify-center p-6">
        @yield('content')
    </main>

</body>
</html>