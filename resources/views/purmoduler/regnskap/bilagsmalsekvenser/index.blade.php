@extends('pur')
@section('content')
    @include('purmoduler.regnskap.bilagsmalsekvenser._listSubmenu')
<div class="container">
    <h1>Bilagsmalsekvenser</h1>
    <div class="list-group panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-1">
                    {!! Form::checkbox('', '') !!}
                </div>
                <div class="col-sm-4">
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
                    <div class="col-sm-1">
                        {!! Form::checkbox('', '') !!}
                    </div>
                    <div class="col-sm-4">
                        <span class="visible-xs-inline">Beskrivelse: </span>
                        {{ $bilagsmalsekvens->oppgave->beskrivelse }}
                    </div>
                    <div class="col-sm-2">
                        <span class="visible-xs-inline">Sekvenstype: </span>
                        {{ $bilagsmalsekvens->sekvenstype }}
                    </div>
                    <div class="col-sm-2">
                        <span class="visible-xs-inline">Opprettet: </span>
                        {{ $bilagsmalsekvens->oppgave->tid_opprettet }}
                    </div>
                    <div class="col-sm-1">
                        <span class="visible-xs-inline">Laget av: </span>
                        {{ $bilagsmalsekvens->oppgave->skaper->etternavn }}
                    </div>
                    <div class="col-sm-2">
                        <div class="btn-group pull-right">
                            <a href="{!! URL::route('bilagsmalsekvenser.show', $bilagsmalsekvens) !!}" class="btn btn-default" data-toggle="tooltip" data-placement="top" container="body" title="Vis bilag">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a href="{!! URL::route('bilagsmalsekvenser.edit', $bilagsmalsekvens) !!}" class="btn btn-default" data-toggle="tooltip" data-placement="top" container="body" title="Rediger bilag">
                                <span class="fa fa-edit"></span>
                            </a>
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
