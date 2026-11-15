<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locataires', function (Blueprint $table) {

            $table->id();

            $table->string('nom');

            $table->string('prenom')->nullable();

            $table->string('telephone');

            $table->string('email')->nullable();

            $table->string('adresse')->nullable();

            $table->string('piece_identite')->nullable();

            $table->string('photo')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locataires');
    }
};