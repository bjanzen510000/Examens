@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- Header tekst --}}
                    <div class="card-header">Melding maken</div>
                        <div class="card-body">
                        <!-- Zet de titel van de pagina -->
                        <h1 class="my-3 text-center">Uw Melding</h1>
                        <!-- Maakt het formulier, voornaam, achternaam, email. -->
                            <form action="/meldingen" method="post">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    {{-- Formulier met alle text --}}
                                    <input type="text" name="bedrijfsnaam" class="form-control mb-3" placeholder="Bedrijfsnaam" required>
                                    <input type="text" name="contactpersoon" class="form-control mb-3" placeholder="Contactpersoon" required>
                                    <input type="text" name="telefoonnummer" class="form-control mb-3" placeholder="Telefoonnummer" required>
                                    <input type="text" name="domeinnaam" class="form-control mb-3" placeholder="Uw Domeinnaam" required>
                                    <textarea type="text" name="beschrijving" class="form-control mb-3" rows="6" placeholder="Beschrijving" required></textarea>
                                </div>
                                    <p>Om welke afdeling gaat dit?</p>
                                    {{-- knopjes om te kiezen voor welke categorie het bericht bedoeld is --}}
                                    <input type="radio" name="categorie"  value="web" required>Web<br>
                                    <input type="radio" name="categorie"  value="beheer" required>Beheer<br>
                                    <!-- Knop voor het verzenden van de data -->
                                    <br><button type="submit">Verzenden</button>

                            </form>
                            {{-- Zet de status succes, geeft melding dat bericht is verzonden --}}
                            @if (session('status'))
                                <div class="aler alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection



