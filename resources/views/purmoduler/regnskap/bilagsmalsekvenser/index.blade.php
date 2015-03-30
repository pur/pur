@extends('pur')
@section('content')
<div class="container">
    <h1>bilagsmalsekvenser</h1>
    <div class="list-group panel panel-primary">
        <div class="panel-heading">
            <div class="row">
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
        @foreach($bilagsmalsekvenser as $bilagsmalsekvens)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-5">
                        <a href="{!! URL::route('bilagsmalsekvenser.show', $bilagsmalsekvens) !!}">
                            {{ $bilagsmalsekvens->oppgave->beskrivelse }}
                        </a>
                    </div>
                    <div class="col-sm-2">
                        {{ $bilagsmalsekvens->sekvenstype }}
                    </div>
                    <div class="col-sm-2">
                        {{ $bilagsmalsekvens->oppgave->tid_opprettet }}
                    </div>
                    <div class="col-sm-1">
                        {{ $bilagsmalsekvens->oppgave->skaper->etternavn }}
                    </div>
                    <div class="col-sm-2">
                        <div class="btn-group">
                            <a href="{!! URL::route('bilagsmalsekvenser.show', $bilagsmalsekvens) !!}"
                               class="btn btn-default">Vis</a>
                            <a href="{!! URL::route('bilagsmalsekvenser.edit', $bilagsmalsekvens) !!}"
                               class="btn btn-default"><span class="fa fa-edit"></span> Rediger</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')


@endsection
