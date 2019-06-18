<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meldingen extends Model
{
    // Hier worden de gegevens van de melding op een rijtje gezet, zo dat deze worden opgeslagen.
    protected $fillable = [
        'id',
        'bedrijfsnaam',
        'contactpersoon',
        'telefoonnummer',
        'email',
        'domeinnaam',
        'beschrijving'];

    protected $table = 'meldingen';
}


