<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors(['email' => 'Las credenciales no coinciden.'])
            ->withInput($request->only('email'));
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTRO USUARIO NORMAL
    |--------------------------------------------------------------------------
    */

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'role'       => 'user',       // 👈 usuario normal
            'service_id' => null,         // por si existe la columna
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTRO TÉCNICO
    |--------------------------------------------------------------------------
    */

    // Vista de registro de técnico (llena el select con servicios)
    public function registerTechView()
    {
        $services = Service::all(); // SELECT * FROM services

        return view('auth.register_technician', compact('services'));
    }

    // Guarda al técnico
    public function registerTechnician(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', 'max:255', 'unique:users,email'],
            'service_id'            => ['required', 'exists:services,id'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'role'       => 'technician',      // 👈 rol técnico
            'service_id' => $data['service_id'],
        ]);

        Auth::login($user);

        // Si ya tienes una vista de perfil técnico puedes redirigir ahí;
        // si no, manda al home:
        return redirect()->route('home');
        // return redirect()->route('technician.profile');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /*
    |--------------------------------------------------------------------------
    | PERFIL DE USUARIO NORMAL
    |--------------------------------------------------------------------------
    */

    public function userProfile()
    {
        $user = Auth::user();

        // Ajusta el nombre de la vista si la tuya se llama diferente:
        // por ejemplo users/dashboard.blade.php
        return view('users.dashboard', compact('user'));
    }

    public function editUser()
    {
        $user = Auth::user();

        // Cambia "users.edit" al nombre real de tu vista de edición
        return view('users.edit', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name  = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()->route('user.profile')
            ->with('status', 'Perfil actualizado correctamente.');
    }
}
