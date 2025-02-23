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
        Schema::create('tb_compras', function (Blueprint $table) {
            $table->bigIncrements('id_venta');
            $table->date('fventa');
            $table->string('monto');
            $table->integer('id_usuario');
            $table->integer('id_dispositivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
