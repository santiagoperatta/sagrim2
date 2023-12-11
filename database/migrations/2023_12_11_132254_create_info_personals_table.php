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
        Schema::create('info_personals', function (Blueprint $table) {
            $table->id();
			$table->string('nombre');
			$table->string('dni');
			$table->string('cuit');
			$table->string('razon_social');
			$table->foreignId('expediente_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_personals');
    }
};
