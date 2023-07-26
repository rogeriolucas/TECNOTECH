<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// database/migrations/xxxx_xx_xx_create_annual_fees_table.php
 function up()
{
    Schema::create('annual_fees', function (Blueprint $table) {
        $table->id();
        $table->year('year');
        $table->decimal('amount', 8, 2);
        $table->timestamps();
    });
}
