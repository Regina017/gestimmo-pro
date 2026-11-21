<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumn('users', 'identifiant')) {
                $table->string('identifiant')->unique()->nullable();
            }

            if (!Schema::hasColumn('users', 'telephone')) {
                $table->string('telephone')->nullable();
            }

            if (!Schema::hasColumn('users', 'statut')) {
                $table->string('statut')->default('Actif');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'identifiant',
                'telephone',
                'statut'
            ]);

        });
    }
};