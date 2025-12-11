@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Agregar Técnico</h2>

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('technicians.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Especialidad</label>
                    <input type="text" name="specialty" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="city" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Calificación (0 a 5)</label>
                    <input type="number" name="rating" min="0" max="5" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('technicians.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
