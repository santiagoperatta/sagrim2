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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
			$table->boolean('estado');
			$table->boolean('enviado');
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->boolean('tiene_observacion');
			$table->boolean('controlprevio');
			$table->timestamps();
			$table->unsignedBigInteger('admin_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
