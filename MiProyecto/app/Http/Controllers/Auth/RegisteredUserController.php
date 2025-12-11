<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    // FORMULARIO PARA REGISTRAR TÉCNICO
    public function createTechnician()
    {
        $services = Service::all();
        return view('auth.register-technician', compact('services'));
    }

    // GUARDAR TÉCNICO
    public function storeTechnician(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'service_id' => 'required|exists:services,id',
            'password' => 'required|confirmed|min=6',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'technician',
        ]);

        // Guardar técnico
        Technician::create([
            'user_id' => $user->id,
            'service_id' => $request->service_id,
            'photo' => $request->hasFile('photo')
                ? $request->photo->store('technicians', 'public')
                : null,
        ]);

        return redirect()->route('login')
            ->with('success', 'Técnico registrado correctamente ✔');
    }
}
