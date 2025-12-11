@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-900 to-slate-950 pb-20">

    <section class="max-w-6xl mx-auto px-6 pt-24 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                Técnicos confiables cerca de ti
            </h1>
            <p class="text-slate-300 mb-6">
                MultiServicios conecta clientes con plomeros, electricistas, técnicos en
                cómputo y más, de forma rápida y segura.
            </p>
            <div class="space-x-4">
                <a href="{{ route('services.index') }}"
                   class="bg-cyan-500 hover:bg-cyan-400 text-black font-bold px-5 py-3 rounded-xl">
                    Ver servicios
                </a>
                <a href="{{ route('hire') }}"
                   class="border border-cyan-400 text-cyan-300 px-5 py-3 rounded-xl hover:bg-cyan-900/40">
                    Contratar técnico
                </a>
            </div>
        </div>

        {{-- MAPA (iframe de Google Maps genérico) --}}
        <div class="w-full h-[500px] rounded-3xl overflow-hidden shadow-2xl border border-slate-700 my-10">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30106.520882532764!2d-99.1606444!3d19.4267267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f92dfefcb75b%3A0x5fdfbb9d8c74ea39!2sCentro%20Hist%C3%B3rico%20de%20la%20Ciudad%20de%20M%C3%A9xico!5e0!3m2!1ses!2smx!4v1700000000000"
        width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
    </iframe>
</div>

    </section>

</div>
@endsection
