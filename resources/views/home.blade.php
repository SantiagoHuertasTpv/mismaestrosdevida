@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto text-center space-y-8 py-12 px-4">
    <h1 class="text-amber-500 text-4xl md:text-6xl font-black tracking-tighter uppercase mb-12">
    PRÓLOGO
</h1>

    <div class="space-y-6 text-gray-200 text-lg md:text-xl leading-relaxed font-light italic">
        <p>No tuve una infancia fácil ni un entorno familiar que pudiera servirme de guía. Hubo carencias, silencios y ausencias que, con el tiempo, entendí que no deberían formar parte del crecimiento de ningún niño. Durante años pensé que eso me había dejado incompleto, sin referencias claras.</p>

        <p>Sin embargo, aunque no tuve los referentes adecuados donde se suponía que debían estar, nunca dejé de buscarlos. No sabía qué necesitaba ni cómo llamarlo, pero incluso en los momentos más confusos había algo dentro que permanecía intacto: una especie de centro desde el que observaba el mundo y a las personas que lo habitaban.</p>

        <p><strong class="text-white">Y fue desde ahí desde donde empecé a reconocer a quienes sí podían enseñarme algo.</strong></p>

        <p>A lo largo de mi vida aparecieron personas que no eran familia, ni héroes, ni salvadores. Personas normales, a veces incluso imperfectas, que sin proponérselo dejaron una huella profunda en mí. No me dieron discursos ni recetas, pero me ofrecieron algo mucho más valioso: ejemplos, gestos, presencias. Supieron estar.</p>

        <p>Si has tenido una vida estable, quizá estas páginas te ayuden a comprender mejor a quienes no partieron del mismo lugar. Y si creciste sin un referente familiar sólido o te pasó algo, tal vez aquí entiendas el valor que puede tener un maestro de vida cuando más se necesita.</p>

        <p>Este libro no es un ajuste de cuentas ni un manual de superación. Es un reconocimiento personal a quienes, sin saberlo, me ayudaron a crecer cuando crecer parecía un acto solitario. A ellos les debo muchas cosas, y una en especial: el nombre de este libro.</p>

        <p class="text-xl md:text-4xl font-bold text-amber-500 not-italic mt-10 uppercase tracking-widest">
    Ellos son <br/>mis Maestros de Vida.
</p>
    </div>

    <div class="pt-10">
        <a href="{{ route('pedido.create') }}" class="inline-block bg-white text-black font-black px-10 py-4 rounded-full hover:bg-gray-200 transition-all uppercase tracking-widest shadow-white/20 shadow-2xl">
            Quiero el libro
        </a>
    </div>
</div>
@endsection