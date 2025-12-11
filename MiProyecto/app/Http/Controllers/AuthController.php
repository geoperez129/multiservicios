<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Service;
use App\Models\Technician;

class AuthController extends Controller
{
    /* ===============================
        LOGIN
    ================================ */
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 Redirección por rol
            if ($user->role === 'technician') {
                return redirect()->route('technician.profile');
            }

            return redirect()->route('user.profile');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    /* ===============================
        REGISTRO USUARIO NORMAL
    ================================ */
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso');
    }

    /* ===============================
        REGISTRO DE TÉCNICO
    ================================ */
    public function registerTechView()
    {
        $services = Service::orderBy('name')->get();

        return view('auth.register_technician', compact('services'));
    }

    public function registerTechnician(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users',
            'service_id'  => 'required|exists:services,id',
            'password'    => 'required|min:6|confirmed',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Crear usuario con rol technician
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'technician',
        ]);

        /* =====================================
            FOTO DE PERFIL
        ====================================== */
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $filename = time().'_tech_'.$user->id.'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/technicians'), $filename);
            $photoPath = 'uploads/technicians/'.$filename;
        }

        /* =====================================
            CREAR PERFIL DE TÉCNICO COMPLETO
        ====================================== */
        Technician::create([
            'user_id'     => $user->id,
            'service_id'  => $request->service_id,
            'specialty'   => null,
            'phone'       => null,
            'city'        => null,
            'description' => null,
            'image'       => $photoPath,
        ]);

        /* =====================================
            INICIAR SESIÓN AUTOMÁTICAMENTE
        ====================================== */
        Auth::login($user);

        return redirect()->route('technician.profile');
    }

    /* ===============================
        PERFIL DE USUARIO NORMAL
    ================================ */
    public function userProfile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function editUser()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('user.profile')
                         ->with('success', 'Perfil actualizado correctamente.');
    }

    /* ===============================
        LOGOUT
    ================================ */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
