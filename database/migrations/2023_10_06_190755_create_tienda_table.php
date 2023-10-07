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
        Schema::create('tienda', function (Blueprint $table) {
            $table->id();
            $table->string('cod_tienda',30)->unique();
            $table->string('nombre', 50);
            $table->string('direccion', 30)->nullable();
            $table->string('celular', 15)->nullable();
            $table->string('logo');
            $table->string('estado', 20);
            $table->unsignedBigInteger('id_user');

            // Foreign key constraint to link 'id_user' with 'id' in the 'users' table
            $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();
        });
    }

    



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tienda');
    }
};
