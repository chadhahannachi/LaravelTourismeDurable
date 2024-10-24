<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItineraireIdToEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etapes', function (Blueprint $table) {
            // $table->unsignedBigInteger('itineraire_id')->after('id');

        // Ajouter une contrainte de clé étrangère
        $table->foreign('itineraire_id')->references('id')->on('itineraires')->onDelete('cascade');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etapes', function (Blueprint $table) {
            $table->dropForeign(['itineraire_id']);
        $table->dropColumn('itineraire_id');
        });
    }
}
