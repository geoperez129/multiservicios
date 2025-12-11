<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Dueño del negocio
            $table->string('business_name'); // Nombre del negocio
            $table->text('description'); // Descripción del negocio
            $table->string('business_type'); // Tipo: Ferretería, Materiales, etc.
            $table->string('address'); // Dirección del negocio
            $table->decimal('latitude', 10, 8); // Ubicación en mapa
            $table->decimal('longitude', 10, 8); // Ubicación en mapa
            $table->string('phone'); // Teléfono del negocio
            $table->string('email')->nullable(); // Email del negocio
            $table->string('website')->nullable(); // Sitio web
            $table->string('logo')->nullable(); // Logo del negocio
            $table->time('opening_time')->nullable(); // Hora de apertura
            $table->time('closing_time')->nullable(); // Hora de cierre
            $table->boolean('active')->default(true); // Negocio activo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};