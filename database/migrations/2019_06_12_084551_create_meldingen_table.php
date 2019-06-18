<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeldingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // hier worden alle gegevens van de melding op een rijtje gezet.
        // deze worden verstuurd naar de database en opgeslagen.
        Schema::create('meldingen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bedrijfsnaam');
            $table->string('contactpersoon');
            $table->string('telefoonnummer');
            $table->string('domeinnaam');
            $table->text('beschrijving');
            $table->text('categorie');
            $table->text('status');
            $table->text('smiley')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // wanneer de tabel meldingen al bestaat, drop deze en maak een nieuwe.
    public function down()
    {
        Schema::dropIfExists('meldingen');
    }
}


