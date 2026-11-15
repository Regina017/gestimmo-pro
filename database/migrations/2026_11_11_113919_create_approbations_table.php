public function up(): void
{
    Schema::create('approbations', function (Blueprint $table) {

        $table->id();

        $table->string('module');

        $table->string('action');

        $table->string('utilisateur');

        $table->longText('donnees');

        $table->string('statut')
            ->default('En attente');

        $table->timestamps();

    });
}

public function down(): void
{
    Schema::dropIfExists('approbations');
}