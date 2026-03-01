@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">🎸 La Banda Sonora de Mi Vida</h1>
    <p class="text-center mb-5 text-muted">Explora las canciones que dan alma a cada capítulo de mi libro.</p>

    @foreach($capitulos as $capitulo)
        <div class="card mb-5 shadow-sm border-0">
            <div class="card-header bg-primary text-white p-3">
                <h3 class="mb-0 h4">Capítulo {{ $capitulo->id }}: {{ $capitulo->titulo }}</h3>
            </div>
            <div class="card-body bg-light">
                <div class="row">
                    @forelse($capitulo->canciones as $cancion)
                        <div class="col-6 col-md-3 text-center mb-4">
                            <div class="bg-white p-3 rounded shadow-sm h-100">
                                <p class="small font-weight-bold mb-2" style="height: 40px; overflow: hidden;">
                                    {{ $cancion->nombre }}
                                </p>
                                {{-- Generación del QR en tiempo real --}}
                                <div class="qr-container">
                                    {!! QrCode::size(120)->generate(url('/q/' . $cancion->slug)) !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p class="text-muted italic">Próximamente más canciones...</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection