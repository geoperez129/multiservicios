<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔥 1. Desactivar foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 🔥 2. Vaciar tablas en orden seguro
        DB::table('ratings')->truncate();
        DB::table('technicians')->truncate();
        DB::table('services')->truncate();
        DB::table('users')->truncate();

        // 🔥 3. Activar nuevamente
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ejecutar seeders normales
        $this->call(ServiceSeeder::class);
        $this->call(TechnicianSeeder::class);
    }
}
