@extends('pur')
@section('content')
    @include('oppgavesett._opplist-undermeny')
    <div class="container">
        <h1>Oppgavesett</h1>
        <blockquote class="bq-info">
            <p>Info om oppgavesett</p>
        </blockquote>
        <section>
            <h2>Mine oppgavesett</h2>

            <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel-heading hidden-xs">
                    <div class="row">
                        <div class="col-sm-2">
                            <b>Beskrivelse:</b>
                        </div>
                        <div class="col-sm-1">
                            <b>Påbegynte:</b>
                        </div>
                        <div class="col-sm-1">
                            <b>Status:</b>
                        </div>
                        <div class="col-sm-2">
                            <b>Publiseringstid:</b>
                        </div>
                        <div class="col-sm-2">
                            <b>Åpen fra:</b>
                        </div>
                        <div class="col-sm-2">
                            <b>Åpen til:</b>
                        </div>
                        <div class="col-sm-2 actions">
                            <b>Handlinger:</b>
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
                            <div class="col-sm-1">
                                <span class="visible-xs-inline">Påbegynte: </span>{{$oppgavesett->besvarelser->count()}}
                            </div>
                            <div class="col-sm-1">
                                <span class="visible-xs-inline">Status: </span>
                                {{$oppgavesett->status()}}

                            </div>
                            <div class="col-sm-2">
                                <span class="visible-xs-inline">Publiseringstid: </span>{{ $oppgavesett->tidPublisert() }}
                                @if($oppgavesett->erPublisert())
                                    (Publisert)
                                @endif
                            </div>

                            <div class="col-sm-2">
                                <span class="visible-xs-inline">Åpent fra: </span>{{ $oppgavesett->tidAapent() }}
                            </div>
                            <div class="col-sm-2">
                                <span class="visible-xs-inline">Åpent til: </span>{{ $oppgavesett->tidLukket() }}
                            </div>
                            <div class="col-sm-2 actions">

                                <div class="pull-right">

                                    <a href="{{ URL::route('oppgavesett.vis', $oppgavesett) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis oppgavesett">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    @if($oppgavesett->erPublisert())
                                        <a class="btn btn-default disabled" data-toggle="tooltip" data-placement="top" data-container="body" title="Kan ikke endres. Oppgavesettet er publisert">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a class="btn btn-default disabled" data-toggle="tooltip" data-placement="top" data-container="body" title="Kan ikke slettes. Oppgavesettet er publisert">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    @else
                                        <a href="{{ URL::route('oppgavesett.rediger', $oppgavesett) }}"
                                           class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger oppgavesett">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Slett oppgavesett">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
