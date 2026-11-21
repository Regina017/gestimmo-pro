<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('paiements', function (Blueprint $table) {

            if (!Schema::hasColumn('paiements', 'contrat_id')) {

                $table->foreignId('contrat_id')
                    ->nullable()
                    ->after('id')
                    ->constrained()
                    ->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {

            if (Schema::hasColumn('paiements', 'contrat_id')) {

                $table->dropForeign(['contrat_id']);
                $table->dropColumn('contrat_id');
            }
        });
    }
};