<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObservacionesSituacionesPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->longtext('ob_situacion_m')->after('observaciones')->comment('observaciones de situacion morbida')->nullable();
            $table->longtext('ob_situacion_s')->after('observaciones')->comment('observaciones de situacion social')->nullable();
            $table->longtext('ob_situacion_p')->after('observaciones')->comment('observaciones de situacion profesional')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            //
        });
    }
}
