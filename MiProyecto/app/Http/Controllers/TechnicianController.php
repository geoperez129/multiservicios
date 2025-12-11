<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TechnicianController extends Controller
{
    /* ============================================================
        PERFIL DE TÉCNICO
    ============================================================ */

    public function showProfile()
{
    $user = Auth::user();

    if ($user->role !== 'technician') {
        return redirect()->route('home')->with('error', 'No tienes acceso a esta sección.');
    }

    $techInfo = Technician::with(['service'])
        ->where('user_id', $user->id)
        ->first();

    // 🔥 SE AGREGA ESTA LÍNEA
    $services = Service::all();

    return view('technicians.profile', compact('user', 'techInfo', 'services'));
}

    /* ============================================================
        EDITAR PERFIL DEL TÉCNICO
    ============================================================ */

    public function editProfile()
    {
        $user = Auth::user();

        if ($user->role !== 'technician') {
            return redirect()->route('home');
        }

        // Siempre devolvemos un registro (nuevo o existente)
        $techInfo = Technician::firstOrNew(['user_id' => $user->id]);
        $services = Service::all();

        return view('profile.edit.technician_edit', compact('user', 'techInfo', 'services'));
    }

    /* ============================================================
        ACTUALIZAR PERFIL DEL TÉCNICO (CON FOTO)
    ============================================================ */

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'technician') {
            return redirect()->route('home');
        }

        $request->validate([
            'specialty'   => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'city'        => 'nullable|string|max:255',
            'service_id'  => 'required|exists:services,id',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Si no existe, se crea; si existe, se actualiza
        $tech = Technician::firstOrNew(['user_id' => $user->id]);

        /* ======== MANEJAR LA FOTO ======== */
        if ($request->hasFile('image')) {

            // Borrar foto anterior si existe
            if ($tech->image && File::exists(public_path($tech->image))) {
                File::delete(public_path($tech->image));
            }

            // Procesar la nueva imagen
            $file       = $request->file('image');
            $fileName   = time() . '_perfil_' . $user->id . '.' . $file->getClientOriginalExtension();
            $filePath   = 'uploads/technicians/' . $fileName;

            // Crear carpeta si no existe
            if (!File::exists(public_path('uploads/technicians'))) {
                File::makeDirectory(public_path('uploads/technicians'), 0755, true);
            }

            // Guardar archivo físico
            $file->move(public_path('uploads/technicians'), $fileName);

            // Guardar ruta en BD
            $tech->image = $filePath;
        }

        /* ======== ACTUALIZAR DEMÁS DATOS ======== */
        $tech->user_id     = $user->id;
        $tech->specialty   = $request->specialty;
        $tech->phone       = $request->phone;
        $tech->city        = $request->city;
        $tech->service_id  = $request->service_id;
        $tech->description = $request->description;

        // Guarda (crea o actualiza)
        $tech->save();

        return redirect()->route('technician.profile')
            ->with('success', 'Perfil actualizado correctamente.');
    }

    /* ============================================================
        LISTA DE TÉCNICOS POR SERVICIO
    ============================================================ */

    public function byService($serviceId)
    {
        $service = Service::findOrFail($serviceId);

        $technicians = Technician::with(['user', 'ratings'])
            ->where('service_id', $serviceId)
            ->get()
            ->map(function ($tech) {
                $tech->avg_rating   = round($tech->ratings->avg('score') ?? 0, 1);
                $tech->rating_count = $tech->ratings->count();
                return $tech;
            });

        return view('technicians.by_service', compact('service', 'technicians'));
    }

    /* ============================================================
        LISTA COMPLETA
    ============================================================ */

    public function index()
    {
        $technicians = Technician::with('user')->get();
        return view('technicians.index', compact('technicians'));
    }

    /* ============================================================
        CREAR TÉCNICO MANUAL (ADMIN)
        (la dejo casi igual, pero usando create limpio)
    ============================================================ */

    public function create()
    {
        $services = Service::all();
        return view('technicians.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'service_id'  => 'required|exists:services,id',
            'specialty'   => 'required|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'city'        => 'nullable|string|max:255',
            'image'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Technician::create([
            'user_id'     => $request->user_id,
            'service_id'  => $request->service_id,
            'specialty'   => $request->specialty,
            'phone'       => $request->phone,
            'city'        => $request->city,
            'image'       => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Técnico creado correctamente');
    }
}
