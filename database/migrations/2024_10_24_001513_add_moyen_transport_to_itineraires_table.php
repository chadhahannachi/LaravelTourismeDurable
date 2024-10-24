<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoyenTransportToItinerairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itineraires', function (Blueprint $table) {
            $table->string('moyenTransport')->nullable(); // Ajout de la colonne
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itineraires', function (Blueprint $table) {
            $table->dropColumn('moyenTransport');
        });
    }
}
