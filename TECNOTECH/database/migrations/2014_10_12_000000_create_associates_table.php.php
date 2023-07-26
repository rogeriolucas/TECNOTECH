<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// database/migrations/xxxx_xx_xx_create_associates_table.php
 function up()
{
    Schema::create('associados', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('email')->unique();
        $table->string('cpf')->unique();
        $table->date('data_filiacao');
        $table->timestamps();
    });
}


?>