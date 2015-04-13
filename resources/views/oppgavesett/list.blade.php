@extends('pur')
@section('content')
    @include('oppgavesett._listSubmenu')
    <div class="container">
        <h1>Alle oppgavesett</h1>

        <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel-heading hidden-xs">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-2">
                                {!! Form::checkbox('', '') !!}
                            </div>
                            <div class="col-sm-10">
                                <b>Beskrivelse:</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <b>Opprettet:</b>
                    </div>
                    <div class="col-sm-1">
                        <b>Påbegynte:</b>
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

            @foreach($oppgavesettsamling as $oppgavesett)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="row">
                                <div class="col-sm-2">
                                    {!! Form::checkbox('', '') !!}
                                </div>
                                <div class="col-sm-10">
                                    <span class="visible-xs-inline">Beskrivelse: </span>{{ $oppgavesett->beskrivelse }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Opprettet: </span>{{ $oppgavesett->tidOpprettet() }}
                        </div>
                        <div class="col-sm-1">
                            <span class="visible-xs-inline">Påbegynte: </span>{{$oppgavesett->besvarelser->count()}}
                        </div>
                        <div class="col-sm-1">
                            <span class="visible-xs-inline">Status: </span>Åpen
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Åpent fra: </span>{{ $oppgavesett->tidAapent() }}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Åpent til: </span>{{ $oppgavesett->tidLukket() }}
                        </div>
                        <div class="col-sm-2">


                            <div class="btn-group pull-right">
                                <a href="{{ URL::route('oppgavesett.show', $oppgavesett) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis statistikk">
                                    <span class="fa fa-bar-chart"></span>
                                </a>
                                <!--TODO lag metoden 'kanEndres()' for oppgavesett-->
                                @if(!1 == 0)
                                    <a class="btn btn-default disabled" data-toggle="tooltip" data-placement="top" data-container="body" title="Kan ikke endres. Oppgavesett er pulbisert">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                @endif
                                @if(1 == 0)
                                <a href="{{ URL::route('oppgavesett.edit', $oppgavesett) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger oppgavesett">
                                    <span class="fa fa-edit"></span>
                                </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
