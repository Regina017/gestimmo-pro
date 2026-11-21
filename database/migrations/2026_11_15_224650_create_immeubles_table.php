<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('immeubles', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('proprietaire_id')->nullable();

            $table->string('nom');

            $table->string('adresse');

            $table->string('ville')->nullable();

            $table->integer('nombre_logements')->default(0);

            $table->text('description')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('immeubles');
    }
};