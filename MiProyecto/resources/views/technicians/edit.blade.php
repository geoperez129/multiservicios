@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Editar Técnico</h2>

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('technicians.update', $technician->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $technician->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Especialidad</label>
                    <input type="text" name="specialty" class="form-control" value="{{ $technician->specialty }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="phone" class="form-control" value="{{ $technician->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="city" class="form-control" value="{{ $technician->city }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Calificación</label>
                    <input type="number" name="rating" min="0" max="5" class="form-control" value="{{ $technician->rating }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="description" rows="3" class="form-control">{{ $technician->description }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('technicians.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
