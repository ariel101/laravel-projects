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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('genero',12);
            $table->integer('edad');
            $table->string('raza',50);
            $table->bigInteger('propietarioId')->unsigned()->nullable();
            $table->string('direccion',100);
            $table->timestamps();

            $table->foreign('propietarioId')->references('id')->on('propietarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
