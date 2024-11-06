<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('locais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_do_local');
            $table->string('distancia_roteador');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locais');
    }
};
