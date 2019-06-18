<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // hier wordt de password reset tabel aangemaakt
    // alle gegevens worden opgeslagen en ook de token waarmee je toegang krijgt tot het opnieuw instellen van je wachtwoord.
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // als de tabel password_resets al bestaat, wordt de tabel verwijderd ( drop ) en daarna een nieuwe gemaakt.
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
