<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Carpintería',
                'description' => 'Muebles, closets y reparación',
                'image' => 'carpinteria.webp'
            ],
            [
                'name' => 'Cerrajería',
                'description' => 'Cerraduras, llaves y apertura de puertas',
                'image' => 'cerrajeria.webp'
            ],
            [
                'name' => 'Construcción',
                'description' => 'Obra, remodelaciones y mantenimiento general',
                'image' => 'construccion.webp'
            ],
            [
                'name' => 'Decoración de Interiores',
                'description' => 'Diseño y ambientación',
                'image' => 'decoracion_interiores.webp'
            ],
            [
                'name' => 'Electricidad',
                'description' => 'Instalaciones eléctricas y mantenimiento',
                'image' => 'electricidad.webp'
            ],
            [
                'name' => 'Fumigación',
                'description' => 'Control de plagas y sanitización',
                'image' => 'fumigacion.webp'
            ],
            [
                'name' => 'Herrería',
                'description' => 'Estructuras metálicas y soldadura',
                'image' => 'herreria.webp'
            ],
            [
                'name' => 'Impermeabilización',
                'description' => 'Sellado y protección contra humedad',
                'image' => 'impermeabilizacion.webp'
            ],
            [
                'name' => 'Instalación de Cámaras',
                'description' => 'CCTV y sistemas de seguridad',
                'image' => 'instalacion_camaras.webp'
            ],
            [
                'name' => 'Jardinería',
                'description' => 'Mantenimiento de áreas verdes',
                'image' => 'jardineria.webp'
            ],
            [
                'name' => 'Limpieza',
                'description' => 'Servicios profesionales de limpieza',
                'image' => 'limpieza.webp'
            ],
            [
                'name' => 'Mudanzas',
                'description' => 'Movilidad y transporte seguro',
                'image' => 'mudanzas.webp'
            ],
            [
                'name' => 'Pintura',
                'description' => 'Pintura residencial y comercial',
                'image' => 'pintura.webp'
            ],
            [
                'name' => 'Plomería',
                'description' => 'Reparación e instalación de tuberías',
                'image' => 'plomeria.webp'
            ],
            [
                'name' => 'Refrigeración',
                'description' => 'Instalación y reparación de A/A',
                'image' => 'refrigeracion.webp'
            ],
            [
                'name' => 'Soporte Técnico',
                'description' => 'Mantenimiento de computadoras y redes',
                'image' => 'soporte_tecnico.webp'
            ],
            [
                'name' => 'Vidriería',
                'description' => 'Instalación y reparación de cristales',
                'image' => 'vidrieria.webp'
            ],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(
                ['name' => $s['name']],
                $s
            );
        }
    }
}
