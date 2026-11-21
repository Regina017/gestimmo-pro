<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('logements', function (Blueprint $table) {

            if (!Schema::hasColumn('logements', 'immeuble_id')) {

                $table->foreignId('immeuble_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnDelete();
            }

            if (!Schema::hasColumn('logements', 'statut')) {

                $table->enum(
                    'statut',
                    ['Vacant','Occupé']
                )->default('Vacant');
            }
        });
    }

    public function down(): void
    {
        //
    }
};