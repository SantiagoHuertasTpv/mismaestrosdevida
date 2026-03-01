@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    <div class="text-center mb-16">
        <h1 class="text-amber-500 text-4xl md:text-6xl font-black tracking-tighter uppercase mb-4">
            🎸 La Banda Sonora
        </h1>
        <p class="text-gray-300 text-lg md:text-xl italic font-light">
            Escanea las canciones que inspiraron cada capítulo.
        </p>
    </div>

    @foreach($capitulos as $capitulo)
    <div class="mb-20">
        <div class="flex flex-col md:flex-row md:items-end gap-2 mb-8 border-b border-amber-500/30 pb-4">
            <span class="text-amber-500 font-black text-xl uppercase tracking-widest">
                Capítulo {{ $capitulo->id }}:
            </span>
            <h2 class="text-white font-bold text-3xl md:text-4xl uppercase tracking-tighter">
                {{ $capitulo->nombre }}
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($capitulo->canciones as $cancion)
                <div class="bg-white/5 backdrop-blur-md border border-white/10 p-6 rounded-3xl flex flex-col items-center hover:bg-white/10 transition-all shadow-2xl">
                    <h3 class="text-white font-bold text-center mb-4 h-12 flex items-center justify-center text-sm uppercase tracking-tight leading-tight">
                        {{ $cancion->nombre }}
                    </h3>
                    
                    <div class="bg-white p-3 rounded-2xl shadow-white/10 shadow-lg">
                        {!! QrCode::size(130)->margin(1)->generate(url('/q/' . $cancion->slug)) !!}
                    </div>
                    
                    <p class="mt-4 text-amber-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        Escaneo Directo
                    </p>
                </div>
            @empty
                <div class="col-span-full p-10 border border-dashed border-white/20 rounded-3xl text-center">
                    <p class="text-gray-500 italic">Próximamente más música para este capítulo...</p>
                </div>
            @endforelse
        </div>
    </div>
@endforeach
</div>
@endsection