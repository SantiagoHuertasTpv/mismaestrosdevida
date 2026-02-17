@extends('layouts.app')

@section('content')
<div class="bg-[#1a1a1a]/95 border-2 border-white/10 rounded-[2.5rem] p-8 md:p-10 w-full max-w-2xl shadow-2xl backdrop-blur-md mb-10">
    <h2 class="text-amber-500 text-2xl font-bold text-center mb-8 uppercase tracking-widest">
        Formulario de Pedido
    </h2>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-xl text-green-400 text-center font-bold">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pedido.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div class="space-y-2 md:col-span-2">
            <label class="text-gray-400 text-xs uppercase px-1">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-xs uppercase px-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}"
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-xs uppercase px-1">Teléfono</label>
            <input type="tel" name="telefono" value="{{ old('telefono') }}"
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2 md:col-span-2">
            <label class="text-gray-400 text-xs uppercase px-1">Dirección *</label>
            <input type="text" name="direccion" value="{{ old('direccion') }}" required
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-xs uppercase px-1">Ciudad *</label>
            <input type="text" name="ciudad" value="{{ old('ciudad') }}" required
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-xs uppercase px-1">Provincia</label>
            <input type="text" name="provincia" value="{{ old('provincia') }}"
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-xs uppercase px-1">Código Postal *</label>
            <input type="text" name="cp" value="{{ old('cp') }}" required
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-gray-400 text-xs uppercase px-1">Cantidad *</label>
            <input type="number" name="cantidad" value="{{ old('cantidad', 1) }}" min="1" max="20" required
                class="w-full bg-[#2a2a2a] text-white border-none rounded-xl p-3 focus:ring-2 focus:ring-cyan-600 outline-none transition-all">
        </div>

        <div class="md:col-span-2 flex items-start space-x-3 py-2">
            <input id="acepto" name="acepto" type="checkbox" required
                class="w-5 h-5 bg-[#2a2a2a] border-white/10 rounded text-cyan-600 focus:ring-cyan-600 cursor-pointer">
            <label for="acepto" class="text-[11px] text-gray-400 leading-tight cursor-pointer">
                He leído y acepto los términos de envío y política de privacidad.
            </label>
        </div>

        <div class="md:col-span-2 pt-4">
            <button type="submit"
                class="w-full bg-gradient-to-r from-amber-600 to-amber-800 text-white font-black py-4 rounded-full hover:brightness-125 transition-all shadow-lg uppercase tracking-widest">
                REALIZAR PEDIDO
            </button>
        </div>
    </form>
</div>
@endsection