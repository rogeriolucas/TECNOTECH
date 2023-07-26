<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 function up()
{
    Schema::create('pagamentos_anuidades', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('associado_id');
        $table->unsignedBigInteger('anuidade_id');
        $table->boolean('pago')->default(false);
        $table->timestamps();

        $table->foreign('associado_id')->references('id')->on('associados');
        $table->foreign('anuidade_id')->references('id')->on('anuidades');
    });
}
