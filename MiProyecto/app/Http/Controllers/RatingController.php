<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $technicianId)
    {
        $request->validate([
            'score'   => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:500'],
        ]);

        $user = Auth::user();

        // Evitar que el técnico se califique a sí mismo
        $technician = Technician::findOrFail($technicianId);
        if ($technician->user_id == $user->id) {
            return back()->with('error', 'No puedes calificarte a ti mismo.');
        }

        // Crear o actualizar calificación
        Rating::updateOrCreate(
            [
                'user_id'       => $user->id,
                'technician_id' => $technician->id,
            ],
            [
                'score'   => $request->score,
                'comment' => $request->comment,
            ]
        );

        return back()->with('success', 'Calificación guardada correctamente.');
    }
}
