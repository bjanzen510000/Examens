@extends('layouts.layout')

@section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Storingen</div>

                <div class="card-body">
                    <!-- checkt de sessie -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- zet de titel van de pagina -->
                    <h1>Dit zijn alle actuele storingen:</h1>

                        <!-- Laat de domeinnaam storing en status zien van de melding -->
                        <table class="table table-striped">
                            <tr>
                                <td><h3>Domeinnaam</h3></td>
                                <td><h3>Storing</h3></td>
                                <!-- Alleen wanneer gebruikers ingelogt zijn kunnen ze de status zien. -->
                                @auth()
                                <td><h3>Status</h3></td>
                                @endauth
                            </tr>
                            <!-- Voor elke melding haal de domeinnaam op en de beschrijving -->
                            @foreach ($meldingen as $melding)
                                <tr>
                                    <td>{{$melding->domeinnaam}}</td>
                                    <td>{{$melding->beschrijving}}
                                        <!-- Form voor de smileys bij elke melding kan je een beoordeling geven -->
                                        <form id="smileys" action="/medlingen/smiley-bewerken/{{ $melding->id }}" method="POST">
                                            @csrf
                                            <input type="radio" name="smiley" value="ontevreden" class="smiley-radio sad">
                                            <input type="radio" name="smiley" value="tevreden" class="smiley-radio neutral">
                                            <input type="radio" name="smiley" value="blij" class="smiley-radio happy active" checked>
                                            <!-- het rusultaat moet de gekozen smiley zijn waar op geklikt is -->
                                            <div>Ik ben <span id="result">{{ $melding->smiley  }}</span> met het resultaat.</div>
                                        </form>
                                    </td>
                                    @auth()
                                    <td>
                                        <!-- Als de gebruiker zelf de melding heeft aangemaakt laat hij de status zien -->
                                        @if(auth()->user()->id == $melding->id)
                                            {{ $melding->status }}
                                        <!-- Anders krijg je de status niet te zien, alleen degene die de melding heeft aangemaakt kan dat zien -->
                                        @else
                                            -
                                        @endif
                                    </td>
                                    @endauth
                                </tr>
                            @endforeach
                        </table>

                        <!-- Script om de smiley, wanneer daar op geklikt wordt te versturen. -->
                        <script defer>
                            $('.smiley-radio').on('click', function () {
                                $('#smileys').submit();
                            })
                        </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
