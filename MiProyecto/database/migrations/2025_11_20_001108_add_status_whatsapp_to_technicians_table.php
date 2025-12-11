<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->string('status')->default('disponible'); // disponible, ocupado, no_disponible
            $table->string('whatsapp')->nullable(); // solo número, sin +52 (lo agregamos en el link)
        });
    }

    public function down(): void
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->dropColumn(['status', 'whatsapp']);
        });
    }
};
