<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            // Quién califica
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // A qué técnico califican
            $table->foreignId('technician_id')->constrained()->onDelete('cascade');

            // Calificación de 1 a 5
            $table->unsignedTinyInteger('score'); // 1–5

            // Comentario opcional
            $table->text('comment')->nullable();

            $table->timestamps();

            // Un usuario solo puede calificar una vez a cada técnico
            $table->unique(['user_id', 'technician_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
