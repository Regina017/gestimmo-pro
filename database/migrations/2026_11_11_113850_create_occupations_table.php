<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('occupations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('bien_id')
                  ->constrained('biens')
                  ->cascadeOnDelete();

            $table->foreignId('locataire_id')
                  ->constrained('locataires')
                  ->cascadeOnDelete();

            $table->date('date_entree');

            $table->date('date_sortie')
                  ->nullable();

            $table->string('statut')
                  ->default('Occupé');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('occupations');
    }
};
