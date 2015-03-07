@extends('pur')
@section('content')
    <div class="container">
        <h1>Bilagssekvenser</h1>

        <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel-heading">
                <div class=" row">
                    <div class="col-sm-5">
                        <b>Beskrivelse:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Sekvenstype:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Opprettet:</b>
                    </div>
                    <div class="col-sm-1">
                        <b>Laget av:</b>
                    </div>
                </div>
            </div>
            @foreach($bilagssekvenser as $bilagssekvens)
                <div class="list-group-item">
                    <div class="" role="tab" id="bilagssekvens{{$bilagssekvens->id}}">
                        <div class="row">
                            <div class="col-sm-5">
                                <a data-toggle="collapse" data-parent="#accordion"
                                   href="#sekvensinfo{{$bilagssekvens->id}}" aria-expanded="true"
                                   aria-controls="sekvensinfo{{$bilagssekvens->id}}">
                                    {{ $bilagssekvens->oppgave->beskrivelse }}
                                </a>
                            </div>
                            <div class="col-sm-2">
                                {{ $bilagssekvens->sekvenstype }}
                            </div>
                            <div class="col-sm-2">
                                {{ $bilagssekvens->oppgave->tid_opprettet }}
                            </div>
                            <div class="col-sm-1">
                                {{ $bilagssekvens->oppgave->skaper->etternavn }}
                            </div>
                            <div class="col-sm-2">
                                <div class="btn-group">
                                    <a href="{{$bilagssekvens->id}}/" class="btn btn-default">Vis</a>
                                    <a href="{{$bilagssekvens->id}}/edit/" class="btn btn-default">Rediger</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="sekvensinfo{{$bilagssekvens->id}}" class=" collapse" role="tabpanel"
                     aria-labelledby="bilagssekvens{{$bilagssekvens->id}}">


                    @foreach($bilagssekvens->bilagsmaler as $bilagsmal)

                        <div class="list-group-item">{{ $bilagsmal->bilagstype }}</div>

                    @endforeach
                </div>







            @endforeach

        </div>
    </div>

@section('scripts')

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
@endsection
@endsection