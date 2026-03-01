@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    <div class="text-center mb-16">
        <h1 class="text-amber-500 text-4xl md:text-6xl font-black tracking-tighter uppercase mb-4">
            🎸 La Banda Sonora
        </h1>
        <p class="text-gray-300 text-lg md:text-xl italic font-light">
            Haz clic en cada canción para escucharla directamente.
        </p>
    </div>

    @foreach($capitulos as $capitulo)
    <div class="mb-16">
        <div class="flex flex-col md:flex-row md:items-end gap-2 mb-6 border-b border-amber-500/30 pb-4">
            <span class="text-amber-500 font-black text-xl uppercase tracking-widest">
                Capítulo {{ $capitulo->id }}:
            </span>
            <h2 class="text-white font-bold text-3xl md:text-4xl uppercase tracking-tighter">
                {{ $capitulo->nombre }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($capitulo->canciones as $cancion)
            <a href="{{ $cancion->url_destino }}"
                target="_blank"
                class="group bg-white/5 backdrop-blur-md border border-white/10 p-5 rounded-2xl flex items-center justify-between hover:bg-amber-500/10 hover:border-amber-500/50 transition-all shadow-lg">

                <div class="flex items-center gap-4">
                    <div class="text-amber-500 group-hover:scale-110 transition-transform">
                        @if(str_contains(strtolower($cancion->nombre), 'spotify'))
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm5.508 17.304c-.216.336-.648.444-.984.228-2.736-1.68-6.18-2.052-10.236-1.128-.384.084-.768-.156-.852-.54-.084-.384.156-.768.54-.852 4.44-1.02 8.244-.588 11.304 1.296.336.216.444.648.228.996zm1.476-3.264c-.276.444-.852.588-1.296.312-3.132-1.92-7.908-2.484-11.592-1.368-.504.156-1.032-.132-1.188-.636-.156-.504.132-1.032.636-1.188 4.224-1.284 9.492-.648 13.128 1.584.444.276.588.852.312 1.296zm.132-3.396C15.54 8.448 9.504 8.256 5.976 9.324c-.54.168-1.104-.144-1.272-.684-.168-.54.144-1.104.684-1.272 4.044-1.224 10.704-1 14.904 1.488.492.288.66.924.372 1.416-.288.492-.924.66-1.416.372z" />
                        </svg>
                        @else
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                        @endif
                    </div>

                    <span class="text-white font-bold uppercase tracking-tight group-hover:text-amber-500 transition-colors">
                        {{ $cancion->nombre }}
                    </span>
                </div>

                <svg class="w-5 h-5 text-gray-500 group-hover:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
            @empty
            <p class="text-gray-500 italic col-span-full">Próximamente música para este capítulo.</p>
            @endforelse
        </div>
    </div>
    @endforeach

    <div class="text-center mt-12">
        <a href="{{ route('home') }}" class="text-amber-500 hover:text-white transition-colors text-sm uppercase font-bold tracking-widest">
            ← Volver al inicio
        </a>
    </div>
</div>
@endsection