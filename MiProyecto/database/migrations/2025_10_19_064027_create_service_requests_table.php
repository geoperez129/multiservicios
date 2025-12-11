<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Sin foreign key por ahora
            $table->unsignedBigInteger('technician_id'); // Sin foreign key por ahora
            $table->unsignedBigInteger('service_id'); // Sin foreign key por ahora
            $table->text('description'); // Descripción del problema
            $table->string('address'); // Dirección del servicio
            $table->decimal('client_latitude', 10, 8); // Ubicación del cliente
            $table->decimal('client_longitude', 10, 8); // Ubicación del cliente
            $table->enum('status', ['pending', 'accepted', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->decimal('estimated_hours', 4, 1)->nullable(); // Horas estimadas
            $table->decimal('final_cost', 10, 2)->nullable(); // Costo final
            $table->timestamp('scheduled_date')->nullable(); // Fecha programada
            $table->timestamp('completed_at')->nullable(); // Fecha de completado
            $table->text('client_notes')->nullable(); // Notas del cliente
            $table->text('technician_notes')->nullable(); // Notas del técnico
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};