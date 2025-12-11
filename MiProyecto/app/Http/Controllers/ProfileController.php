<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Technician;

class ProfileController extends Controller
{
    // Perfil general (detecta si es user o technician)
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'technician') {
            $tech = Technician::where('user_id', $user->id)->first();
            return view('profile.technician_profile', compact('user', 'tech'));
        }

        return view('profile.user_profile', compact('user'));
    }

    // Editar perfil usuario normal
    public function editUser()
    {
        return view('profile.edit_user');
    }

    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|min:3',
            'email' => 'required|email'
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.index')->with('success', 'Perfil actualizado.');
    }

    // Editar perfil técnico
    public function editTech()
    {
        $user = Auth::user();
        $tech = Technician::where('user_id', $user->id)->first();

        return view('profile.edit_technician', compact('user', 'tech'));
    }

    public function updateTech(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'specialty' => 'required',
            'city'      => 'required'
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        Technician::updateOrCreate(
            ['user_id' => $user->id],
            [
                'specialty' => $request->specialty,
                'city'      => $request->city,
                'phone'     => $request->phone,
            ]
        );

        return redirect()->route('profile.index')->with('success', 'Datos de técnico actualizados.');
    }
}
