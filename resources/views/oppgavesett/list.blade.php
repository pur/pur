@extends('pur')
@section('content')
    @include('oppgavesett._listSubmenu')
    <div class="container">
        <h1>Alle oppgavesett</h1>

        <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel-heading hidden-xs">
                <div class=" row">
                    <div class="col-sm-1">
                        {!! Form::checkbox('', '') !!}
                    </div>
                    <div class="col-sm-2">
                        <b>Opprettet:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Beskrivelse:</b>
                    </div>
                    <div class="col-sm-1">
                        <b>Fullførte:</b>
                    </div>
                    <div class="col-sm-1">
                        <b>Status:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Åpen fra:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Åpen til:</b>
                    </div>
                    <div class="col-sm-2">

                    </div>
                </div>
            </div>

            @foreach($alleoppgavesett as $oppgavesett)
                <div class="list-group-item">
                    <div class="row">

                        <div class="col-sm-1">
                            {!! Form::checkbox('', '') !!}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Opprettet: </span>{{ $oppgavesett->tid_opprettet }}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Beskrivelse: </span>{!! link_to_route('oppgavesett.show', $oppgavesett->beskrivelse, [$oppgavesett->id]) !!}
                        </div>
                        <div class="col-sm-1">
                            <span class="visible-xs-inline">Fullførte: </span>56/100
                        </div>
                        <div class="col-sm-1">
                            <span class="visible-xs-inline">Status: </span>Åpen
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Åpent fra: </span>{{ $oppgavesett->tid_aapent->format('d.m.y H:i') }}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Åpent til: </span>{{ $oppgavesett->tid_lukket->format('d.m.y H:i') }}
                        </div>
                        <div class="col-sm-2">

                            <div class="btn-group pull-right">
                                <a href="{{ URL::route('oppgavesett.show', $oppgavesett) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis statistikk">
                                    <span class="fa fa-bar-chart"></span>
                                </a>
                                <a href="{{ URL::route('oppgavesett.show', $oppgavesett) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis oppgavesett">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="{{ URL::route('oppgavesett.edit', $oppgavesett) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger oppgavesett">
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
