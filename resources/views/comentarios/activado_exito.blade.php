@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[60vh]">
    <div class="bg-[#1a1a1a]/95 border-2 border-amber-500/30 rounded-[2.5rem] p-12 text-center shadow-2xl backdrop-blur-md max-w-lg">
        <div class="text-6xl mb-6">🚀</div>
        <h1 class="text-amber-500 text-3xl font-black uppercase tracking-tighter mb-4">
            ¡Publicado con éxito!
        </h1>
        <p class="text-gray-300 text-lg mb-8">
            El testimonio de <span class="text-white font-bold">{{ $comentario->tunombre }}</span> sobre su maestro ya es visible para todo el mundo.
        </p>
        <a href="/" class="inline-block bg-gradient-to-r from-amber-600 to-amber-800 text-white font-black py-4 px-10 rounded-full hover:brightness-125 transition-all uppercase tracking-widest shadow-lg">
            Volver al Inicio
        </a>
    </div>
</div>
@endsection