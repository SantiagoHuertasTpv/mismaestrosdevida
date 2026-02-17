@extends('layouts.app')

@section('content')
<div class="w-full max-w-md mx-auto">
    <div class="bg-[#1a1a1a]/95 border-2 border-white/10 rounded-[2.5rem] p-10 shadow-2xl backdrop-blur-md">
       <h2 class="text-amber-500 text-2xl font-bold text-center mb-2 uppercase tracking-widest">
            Tu Maestro
        </h2>
        <p class="text-gray-400 text-center text-xs mb-8 uppercase px-4">
            Cuéntanos quién fue esa persona que marcó tu camino, y lo publicaremos en redes sociales para que otros puedan conocer su historia y el impacto que tuvo en tu vida.
        </p>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-xl text-green-400 text-sm text-center font-bold animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('comentarios.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <input type="text" name="tunombre" placeholder="Tu nombre" required 
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
            
            <input type="text" name="nombremaestro" placeholder="Nombre de tu maestro" required 
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">

            <textarea name="comentario_corto" rows="2" placeholder="Resumen corto (Titular)..." required 
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none resize-none transition-all"></textarea>

            <textarea name="comentario_largo" rows="4" placeholder="Escribe aquí tu mensaje completo..." required 
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-4 focus:ring-2 focus:ring-cyan-600 outline-none resize-none transition-all"></textarea>

            <div class="flex items-start space-x-3 py-2">
                <div class="flex items-center h-5">
                    <input id="autorizo" name="autorizo" type="checkbox" required
                        class="w-5 h-5 bg-[#2a2a2a] border-white/10 rounded text-cyan-600 focus:ring-cyan-600 focus:ring-offset-0 cursor-pointer transition-all">
                        @error('autorizo')
    <p class="text-red-500 text-[10px] mt-1 italic">{{ $message }}</p>
@enderror
                </div>
                <label for="autorizo" class="text-[11px] text-gray-400 leading-tight cursor-pointer hover:text-gray-300 transition-colors">
                    Autorizo a ceder los derechos de este comentario para ser publicado en redes sociales y futuros libros.
                </label>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-cyan-800 to-cyan-950 text-white font-black py-4 rounded-full hover:brightness-110 active:scale-95 transition-all uppercase tracking-widest shadow-lg">
                ENVIAR TESTIMONIO
            </button>
        </form>
    </div>
</div>
@endsection