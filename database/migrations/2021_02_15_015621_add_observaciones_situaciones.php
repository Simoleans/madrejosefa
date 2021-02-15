<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObservacionesSituaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('situacion_morbidas', function (Blueprint $table) {
            $table->longText('observaciones')->after('nombre')->nullable();
        });

        Schema::table('situacion_profesionals', function (Blueprint $table) {
            $table->longText('observaciones')->after('nombre')->nullable();
        });

        Schema::table('situacion_socials', function (Blueprint $table) {
            $table->longText('observaciones')->after('nombre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('situacion_morbidas', function (Blueprint $table) {
            //
        });
    }
}
