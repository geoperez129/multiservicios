<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicianSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('technicians')->truncate();

        $technicians = [
            // 🔧 PLOMERÍA
            ['name'=>'Carlos Hernández','specialty'=>'Plomería residencial','city'=>'Guadalajara','service_id'=>1,'experience'=>'8 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712107.png'],
            ['name'=>'Miguel Rojas','specialty'=>'Reparación de fugas','city'=>'CDMX','service_id'=>1,'experience'=>'10 años','certification'=>'CONOCER','hours'=>'Lun-Vie 8am-5pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712107.png'],
            ['name'=>'Roberto Castillo','specialty'=>'Instalación hidráulica','city'=>'Puebla','service_id'=>1,'experience'=>'7 años','certification'=>'SEP','hours'=>'Lun-Sáb 10am-7pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712107.png'],

            // ⚡ ELECTRICIDAD
            ['name'=>'Laura Martínez','specialty'=>'Instalaciones eléctricas','city'=>'CDMX','service_id'=>2,'experience'=>'9 años','certification'=>'CFE','hours'=>'Lun-Sáb 8am-6pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/942/942799.png'],
            ['name'=>'David Gómez','specialty'=>'Paneles solares','city'=>'Monterrey','service_id'=>2,'experience'=>'6 años','certification'=>'CFE','hours'=>'Lun-Vie 9am-5pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/942/942799.png'],
            ['name'=>'Karen Juárez','specialty'=>'Cableado estructurado','city'=>'Toluca','service_id'=>2,'experience'=>'5 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.7,'image'=>'https://cdn-icons-png.flaticon.com/512/942/942799.png'],

            // 🧱 CONSTRUCCIÓN
            ['name'=>'Jesús Pineda','specialty'=>'Obra civil','city'=>'Querétaro','service_id'=>3,'experience'=>'15 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 8am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4725/4725660.png'],
            ['name'=>'Alberto Torres','specialty'=>'Remodelaciones','city'=>'CDMX','service_id'=>3,'experience'=>'9 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-5pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/4725/4725660.png'],
            ['name'=>'Felipe Sánchez','specialty'=>'Construcción residencial','city'=>'Puebla','service_id'=>3,'experience'=>'12 años','certification'=>'SEP','hours'=>'Lun-Vie 8am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4725/4725660.png'],

            // 💻 COMPUTACIÓN
            ['name'=>'Iván García','specialty'=>'Soporte técnico y redes','city'=>'CDMX','service_id'=>4,'experience'=>'7 años','certification'=>'Cisco CCNA','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712102.png'],
            ['name'=>'Diana Pérez','specialty'=>'Mantenimiento de computadoras','city'=>'Guadalajara','service_id'=>4,'experience'=>'5 años','certification'=>'Microsoft','hours'=>'Lun-Vie 8am-5pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712102.png'],
            ['name'=>'Ricardo Cruz','specialty'=>'Instalación de software','city'=>'León','service_id'=>4,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-7pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712102.png'],

            // 🪵 CARPINTERÍA
            ['name'=>'Juan López','specialty'=>'Carpintería fina','city'=>'Querétaro','service_id'=>5,'experience'=>'11 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 9am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/3649/3649267.png'],
            ['name'=>'Marcos Ortiz','specialty'=>'Reparación de muebles','city'=>'Toluca','service_id'=>5,'experience'=>'8 años','certification'=>'SEP','hours'=>'Lun-Vie 8am-5pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/3649/3649267.png'],
            ['name'=>'Pedro Velázquez','specialty'=>'Diseño de closets','city'=>'CDMX','service_id'=>5,'experience'=>'6 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 10am-7pm','rating'=>4.7,'image'=>'https://cdn-icons-png.flaticon.com/512/3649/3649267.png'],

            // 🎨 PINTURA
            ['name'=>'Luis Ramírez','specialty'=>'Pintura industrial','city'=>'Monterrey','service_id'=>6,'experience'=>'10 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/2995/2995422.png'],
            ['name'=>'Francisco Díaz','specialty'=>'Decoración de interiores','city'=>'CDMX','service_id'=>6,'experience'=>'7 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 8am-5pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/2995/2995422.png'],
            ['name'=>'Andrés Flores','specialty'=>'Pintura ecológica','city'=>'Puebla','service_id'=>6,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Vie 9am-5pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/2995/2995422.png'],

            // 🌿 JARDINERÍA
            ['name'=>'Eduardo Medina','specialty'=>'Diseño de jardines','city'=>'Guadalajara','service_id'=>7,'experience'=>'8 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 9am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/7662/7662583.png'],
            ['name'=>'Sofía Ramírez','specialty'=>'Riego automático','city'=>'Querétaro','service_id'=>7,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Vie 9am-5pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/7662/7662583.png'],
            ['name'=>'Héctor Luna','specialty'=>'Poda y mantenimiento','city'=>'CDMX','service_id'=>7,'experience'=>'9 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/7662/7662583.png'],

            // 🔒 CERRAJERÍA
            ['name'=>'Rafael Torres','specialty'=>'Cerrajería automotriz','city'=>'Puebla','service_id'=>8,'experience'=>'7 años','certification'=>'SEP','hours'=>'Lun-Dom 24h','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/2933/2933867.png'],
            ['name'=>'Daniela Núñez','specialty'=>'Cambio de cerraduras','city'=>'CDMX','service_id'=>8,'experience'=>'5 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/2933/2933867.png'],
            ['name'=>'Mario Vargas','specialty'=>'Duplicado de llaves','city'=>'Toluca','service_id'=>8,'experience'=>'8 años','certification'=>'SEP','hours'=>'Lun-Vie 8am-6pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/2933/2933867.png'],

            // ❄️ AIRE ACONDICIONADO
            ['name'=>'Adrián Campos','specialty'=>'Instalación y mantenimiento A/A','city'=>'CDMX','service_id'=>9,'experience'=>'10 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 9am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712103.png'],
            ['name'=>'Fernando Ruiz','specialty'=>'Carga de gas refrigerante','city'=>'León','service_id'=>9,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Vie 9am-5pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712103.png'],
            ['name'=>'Alejandro Díaz','specialty'=>'Reparación de compresores','city'=>'Guadalajara','service_id'=>9,'experience'=>'8 años','certification'=>'SEP','hours'=>'Lun-Sáb 8am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712103.png'],

            // ⚙️ ELECTRÓNICA
            ['name'=>'Brenda Ortiz','specialty'=>'Reparación de televisores','city'=>'CDMX','service_id'=>10,'experience'=>'7 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712104.png'],
            ['name'=>'Kevin Morales','specialty'=>'Audio y video profesional','city'=>'Monterrey','service_id'=>10,'experience'=>'8 años','certification'=>'CONOCER','hours'=>'Lun-Vie 8am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712104.png'],
            ['name'=>'Diego Fuentes','specialty'=>'Reparación de consolas','city'=>'Querétaro','service_id'=>10,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Sáb 10am-7pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712104.png'],

            // 🧼 LIMPIEZA
            ['name'=>'Martha Silva','specialty'=>'Limpieza residencial','city'=>'Puebla','service_id'=>11,'experience'=>'5 años','certification'=>'SEP','hours'=>'Lun-Sáb 8am-6pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/6211/6211931.png'],
            ['name'=>'Rosa López','specialty'=>'Limpieza de oficinas','city'=>'CDMX','service_id'=>11,'experience'=>'7 años','certification'=>'CONOCER','hours'=>'Lun-Vie 9am-5pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/6211/6211931.png'],
            ['name'=>'Gloria Martínez','specialty'=>'Sanitización de espacios','city'=>'Guadalajara','service_id'=>11,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Sáb 9am-6pm','rating'=>4.8,'image'=>'https://cdn-icons-png.flaticon.com/512/6211/6211931.png'],

            // 📹 CÁMARAS Y SEGURIDAD
            ['name'=>'Oscar Reyes','specialty'=>'Instalación de CCTV','city'=>'CDMX','service_id'=>12,'experience'=>'9 años','certification'=>'CONOCER','hours'=>'Lun-Sáb 9am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712105.png'],
            ['name'=>'Patricia Rivera','specialty'=>'Alarmas y sensores','city'=>'Toluca','service_id'=>12,'experience'=>'6 años','certification'=>'SEP','hours'=>'Lun-Vie 8am-5pm','rating'=>4.9,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712105.png'],
            ['name'=>'Hugo Romero','specialty'=>'Control de acceso y redes','city'=>'Puebla','service_id'=>12,'experience'=>'8 años','certification'=>'Cisco','hours'=>'Lun-Sáb 9am-6pm','rating'=>5,'image'=>'https://cdn-icons-png.flaticon.com/512/4712/4712105.png'],
        ];

        DB::table('technicians')->insert($technicians);
    }
}
