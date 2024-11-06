<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('leituras', function (Blueprint $table) {
            $table->id();

            // Define 'id_local' como unsignedBigInteger para combinar com 'id' em 'locais'
            $table->unsignedBigInteger('id_local')->unsigned();
            $table->foreign('id_local')->references('id')->on('locais')->onDelete('cascade');

            $table->timestamp('data_e_hora');
            $table->float('dbm_2_4_ghz');
            $table->float('dbm_5_ghz');
            $table->float('mbps_2_4_ghz');
            $table->float('mbps_5_ghz');
            $table->float('interferencia_2_4_ghz');
            $table->float('interferencia_5_ghz');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leituras');
    }
};
