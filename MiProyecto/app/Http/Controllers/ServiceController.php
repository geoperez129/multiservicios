<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Obtener TODOS los servicios desde la base de datos
        $services = Service::all();

        return view('services.index', compact('services'));
    }
}
