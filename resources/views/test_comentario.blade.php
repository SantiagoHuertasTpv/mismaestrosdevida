<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS MAESTROS DE VIDA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), 
                              url("{{ asset('images/portada.png') }}");
            background-size: cover;
            /* 50% horizontal, 20% vertical empuja la imagen un poco hacia abajo */
            background-position: 50% 20%; 
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-black min-h-screen flex flex-col items-center justify-center p-6 bg-custom-image">

    <div class="flex flex-col items-center space-y-10 w-full">
        
        <div class="text-center space-y-4">
            <h1 class="text-white text-5xl md:text-7xl font-black tracking-tighter uppercase">
                MIS MAESTROS DE VIDA
            </h1>
            
            <p class="text-red-600 text-base md:text-lg font-bold max-w-2xl mx-auto uppercase italic leading-tight">
                "Puedes enviarnos tu comentario sobre tu maestro de vida y lo publicaremos en redes sociales"
            </p>
        </div>

        <div class="bg-[#1a1a1a]/95 border-2 border-white/10 rounded-[2.5rem] p-10 w-full max-w-md shadow-2xl backdrop-blur-md">
            <h2 class="text-white text-xl font-bold text-center mb-8 uppercase tracking-widest">
                Déjanos tu comentario
            </h2>

            <form action="{{ route('comentarios.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <input type="text" name="tunombre" placeholder="Tu nombre" required
                        class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
                    <p class="text-[10px] text-orange-400/80 px-1">⚠️ Por ley de protección de datos, no incluyas apellidos.</p>
                </div>

                <div class="space-y-2">
                    <input type="text" name="nombremaestro" placeholder="Nombre del maestro" required
                        class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
                    <p class="text-[10px] text-orange-400/80 px-1">⚠️ No pongas apellidos del docente por privacidad.</p>
                </div>

                <textarea name="comentario_corto" rows="2" placeholder="Resumen corto (Titular)..." required
                    class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none resize-none"></textarea>

                <textarea name="comentario_largo" rows="4" placeholder="Escribe aquí tu mensaje completo..." required
                    class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none resize-none"></textarea>

                <div class="flex items-start space-x-3 py-2">
                    <input id="acepto" name="acepto" type="checkbox" required
                        class="mt-1 w-5 h-5 bg-[#2a2a2a] border-gray-600 rounded text-cyan-600 focus:ring-cyan-500 cursor-pointer">
                    <label for="acepto" class="text-[11px] text-gray-400 leading-snug cursor-pointer">
                        Acepto que se utilice este comentario para las redes sociales y libros de <span class="text-white font-bold">Mis Maestros de Vida</span>.
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-cyan-800 to-cyan-950 text-white font-black py-4 rounded-full hover:brightness-125 transition-all shadow-lg uppercase tracking-widest">
                    ENVIAR COMENTARIO
                </button>
            </form>

            @if(session('success'))
            <p class="text-green-500 text-center text-sm mt-6 font-bold italic animate-bounce">
                {{ session('success') }}
            </p>
            @endif
        </div>
    </div>

</body>
</html>