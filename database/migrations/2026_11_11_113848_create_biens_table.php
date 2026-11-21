<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biens', function (Blueprint $table) {

            $table->id();

            $table->string('reference');

            $table->string('type');

            $table->string('adresse');

            $table->decimal('loyer', 12, 2);

            $table->decimal('caution', 12, 2);

            $table->string('statut')
                ->default('Disponible');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};