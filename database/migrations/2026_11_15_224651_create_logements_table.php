<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logements', function (Blueprint $table) {

            $table->id();

            $table->foreignId('immeuble_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('numero');

            $table->string('type');

            $table->decimal(
                'loyer',
                10,
                2
            );

            $table->enum(
                'statut',
                [
                    'Vacant',
                    'Occupé'
                ]
            )->default('Vacant');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logements');
    }
};