<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Cliente que hace la reseña
            $table->unsignedBigInteger('technician_id'); // Técnico calificado
            $table->unsignedBigInteger('service_request_id'); // Solicitud de servicio relacionada
            $table->integer('rating'); // Calificación de 1 a 5 estrellas
            $table->text('comment')->nullable(); // Comentario opcional
            $table->text('response')->nullable(); // Respuesta del técnico
            $table->boolean('recommend')->default(true); // ¿Recomendaría el servicio?
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};