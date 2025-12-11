<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('technicians', function (Blueprint $table) {
            // Agregar service_id DESPUÉS de user_id
            $table->foreignId('service_id')
                ->after('user_id')
                ->constrained('services')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technicians', function (Blueprint $table) {
            // Primero quitamos la foreign key y luego la columna
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
    }
};
