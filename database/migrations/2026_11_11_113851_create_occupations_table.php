<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contrats', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('locataire_id');

            $table->unsignedBigInteger('logement_id');

            $table->date('date_debut');

            $table->date('date_fin')->nullable();

            $table->decimal('loyer', 12, 2);

            $table->decimal('caution', 12, 2)->default(0);

            $table->string('statut')->default('Actif');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};

