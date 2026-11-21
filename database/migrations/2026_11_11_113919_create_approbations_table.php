<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('approbations', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->string('action');
            $table->string('utilisateur');
            $table->longText('donnees');
            $table->string('statut')->default('En attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approbations');
    }
};