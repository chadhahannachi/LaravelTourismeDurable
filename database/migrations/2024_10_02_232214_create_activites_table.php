<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->String("nom");
            $table->String("description");
            $table->enum("type", [
                'Familiale', 
                'Sportive', 
                'Culturelle', 
                'Aventure'
            ]);
            $table->String("niveau_durabilite");
            $table->float("prix");
            $table->integer("disponibilite"); // Ajoutez cette ligne
            $table->string("image")->nullable(); // Ajoutez cette ligne pour l'image
            $table->timestamps();
        });
 }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
