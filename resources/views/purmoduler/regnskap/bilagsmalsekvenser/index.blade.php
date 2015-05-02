@extends('pur')
@section('content')
    @include('oppgaver._opplist-undermeny')
    <div class="container">
        <h1>Bilagsmalsekvenser</h1>

        <div class="list-group panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-4">
                        <b>Beskrivelse:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Sekvenstype:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Opprettet:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Laget av:</b>
                    </div>
                </div>
            </div>
            @foreach($oppgavesett->oppgaver as $oppgave)
                <div class="list-group-item">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-1">
                                    {!! Form::checkbox('', '') !!}
                                </div>
                                <div class="col-sm-11">
                                    <span class="visible-xs-inline">Beskrivelse: </span>
                                    {{ $oppgave->beskrivelse }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Sekvenstype: </span>

                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Opprettet: </span>
                            {{ $oppgave->tidOpprettet }}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Laget av: </span>
                            {{ $oppgave->skaper() }}
                        </div>
                        <div class="col-sm-2">
                            <div class="btn-group pull-right">
                                <a href="{{ URL::route('bilagsmalsekvenser.show', $oppgave) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis bilag">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="{{ URL::route('bilagsmalsekvenser.edit', $oppgave) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger bilag">
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
