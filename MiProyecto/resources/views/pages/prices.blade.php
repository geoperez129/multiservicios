@extends('layouts.app')

@section('title', 'Precios')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-4xl w-full text-white">
            <h1 class="text-4xl font-extrabold mb-8">Precios</h1>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- PLAN BÁSICO --}}
                <div class="bg-slate-900/70 rounded-xl p-6 shadow-lg border border-slate-700">
                    <h2 class="text-2xl font-bold mb-2">Básico</h2>
                    <p class="text-3xl font-extrabold mb-2">$150</p>
                    <p class="mb-6">Servicio rápido y económico.</p>

                    {{-- Mandamos a /servicios con el plan en el query string --}}
                    <a href="{{ url('/servicios?plan=basico') }}"
                       class="inline-block px-4 py-2 rounded-lg font-semibold bg-indigo-500 hover:bg-indigo-400 transition">
                        Contratar
                    </a>
                </div>

                {{-- PLAN ESTÁNDAR --}}
                <div class="bg-slate-900/70 rounded-xl p-6 shadow-lg border border-slate-700">
                    <h2 class="text-2xl font-bold mb-2">Estándar</h2>
                    <p class="text-3xl font-extrabold mb-2">$300</p>
                    <p class="mb-6">Incluye inspección y diagnóstico.</p>

                    <a href="{{ url('/servicios?plan=estandar') }}"
                       class="inline-block px-4 py-2 rounded-lg font-semibold bg-indigo-500 hover:bg-indigo-400 transition">
                        Contratar
                    </a>
                </div>

                {{-- PLAN PREMIUM --}}
                <div class="bg-slate-900/70 rounded-xl p-6 shadow-lg border border-slate-700">
                    <h2 class="text-2xl font-bold mb-2">Premium</h2>
                    <p class="text-3xl font-extrabold mb-2">$500</p>
                    <p class="mb-6">Atención prioritaria y garantía extendida.</p>

                    <a href="{{ url('/servicios?plan=premium') }}"
                       class="inline-block px-4 py-2 rounded-lg font-semibold bg-indigo-500 hover:bg-indigo-400 transition">
                        Contratar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
