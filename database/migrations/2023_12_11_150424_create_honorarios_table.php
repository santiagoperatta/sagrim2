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
        Schema::create('honorarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediente_id')->constrained()->onDelete('cascade');;
			$table->string('superficie');
			$table->string('superficie_cubierta');
			$table->enum('trabajo', ['ACTUALIZACION DE PLANO', 'ARBITRAJES', 'ASISTENCIAS TECNICAS', 'CAMBIO DE TITULARIDAD',
			'CERTIFICADO DE AMOJONAMIENTO', 'CERTIFICADO DE VERIFICACION DE ESTADO PARCELARIO',
			'CERTIFICADO DE VERIFICACION DE ESTADO PARCELARIO P/ ACTUALIZACION DE MENSURA P/ USUCAPION',
			'CERTIFICADO DE VERIFICACION DE ESTADO PARCELARIO P/ PROTOCOLIZACION DE PLANO', 'CONSULTAS', 'CROQUIS PARA REGISTRO DE POSEEDORES', 'DESANEXION, MENSURA, UNION, SUBDIVISION Y ANEXION'
			, 'DESCRIPCION DE PARCELA', 'DESMEJORA', 'DETERMINACION DE RADIO MUNICIPAL', 'DETERMINACION Y MATERIALIZACION DE LINEA MUNICIPAL', 'DICTAMEN PERICIAL', 'ESTUDIO PLANIALTIMETRICO DE CAMINOS
			 Y CANALES', 'ESTUDIO TECNICO, FINANCIERO Y LEGAL', 'GEOREFERENCIACION', 'INFORME PERICIAL']);
			$table->string('unidades');
			$table->string('plantas');
			$table->string('nro_lote');
            $table->string('P');
			$table->string('L');
            $table->decimal('valor', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('honorarios');
    }
};
