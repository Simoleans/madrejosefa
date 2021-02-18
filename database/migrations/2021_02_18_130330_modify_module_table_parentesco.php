<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyModuleTableParentesco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('parentescos');

        Schema::create('parentescos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas');
            $table->string('nombres');
            $table->string('apellido_materno')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('direccion')->nullable();
            $table->string('estado_civil',25)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('nivel_instruccion')->nullable();
            $table->string('pais_origen');
            $table->string('tipo_documento')->nullable();
            $table->string('nro_documento')->nullable();
            $table->string('parentesco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
