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
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->bigIncrements('id_admin');
            $table->string('nombre');
            $table->string('appat');
            $table->string('apmat');
            $table->date('fn');
            $table->string('genero');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_rol')->default(1); 
            $table->tinyInteger('activo')->default(1); 
            $table->integer('intentos_fallidos')->default(0);
            $table->timestamp('bloqueado_hasta')->nullable();
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
