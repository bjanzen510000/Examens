@extends('layouts.web')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Web menu</div>

                    <div class="card-body">
                        <!-- 4 Tabellen -->
                            <table class="table table-striped">
                                <tr>
                                    <td><h3>Domeinnaam</h3></td>
                                    <td><h3>Storing</h3></td>
                                    <td><h3>Categorie</h3></td>
                                    <td><h3>Status</h3></td>
                                </tr>
                                <!-- Voor elke melding de domeinnaam ophalen beschrijving en catagorie. -->
                                @foreach ($meldingen as $melding)
                                    <tr>
                                        <td>{{$melding->domeinnaam}}</td>
                                        <td>{{$melding->beschrijving}}</td>
                                        <td>{{$melding->categorie}}</td>
                                        <td>
                                            <!-- Status bewerken ( id ) -->
                                            <form action="/meldingen/status-bewerken/{{ $melding->id }}" method="post">
                                                @csrf
                                                <!-- Opties voor te kiezen status. -->
                                                    <select name="status"class="status-select form-control">
                                                    <option value="aangemeld" {{ $melding->status == 'aangemeld' ? ' selected' : '' }}>Aangemeld</option>
                                                    <option value="aangenomen" {{ $melding->status == 'aangenomen' ? ' selected' : '' }}>Aangenomen</option>
                                                    <option value="afgehandeld" {{ $melding->status == 'afgehandeld' ? ' selected' : '' }}>Afgehandeld</option>
                                                </select>
                                            </form></td>
                                    </tr>
                                @endforeach
                                <!-- Klein stukje jquery/js om de status wanneer het veranderd wordt dus op geklikt wordt te veranderen en te versturen -->
                                <script defer>
                                    $('.status-select').on('change', function () {
                                        $(this).parent().submit();
                                    })
                                </script>

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

