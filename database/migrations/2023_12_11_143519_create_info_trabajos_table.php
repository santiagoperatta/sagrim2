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
        Schema::create('info_trabajos', function (Blueprint $table) {
            $table->id();
			$table->string('nomenclatura');
			$table->string('nro_cuenta');
			$table->string('datos');
			$table->enum('tipo_parcela', ['urbana', 'rural']);
			$table->string('tasa_colegio');
			$table->foreignId('expediente_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_trabajos');
    }
};
