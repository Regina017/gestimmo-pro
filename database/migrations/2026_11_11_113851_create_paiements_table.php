<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paiements', function (Blueprint $table) {

            $table->id();

            $table->foreignId('occupation_id')
                  ->constrained('occupations')
                  ->cascadeOnDelete();

            $table->date('date_paiement');

            $table->decimal('montant', 12, 2);

            $table->decimal('reste', 12, 2)
                  ->default(0);

            $table->string('mode_paiement')
                  ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
