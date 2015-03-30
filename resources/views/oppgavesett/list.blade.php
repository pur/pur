@extends('pur')
@section('content')
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
                    <div class="col-sm-1">
                        <b>Stats:</b>
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
                            <span class="visible-xs-inline">Opprettet: </span>{!! $oppgavesett->tid_opprettet !!}
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
                            <span class="visible-xs-inline">Åpen fra: </span>{!! $oppgavesett->tid_aapent !!}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Åpen til: </span>{!! $oppgavesett->tid_lukket !!}
                        </div>
                        <div class="col-sm-1">
                            <a href="{!! $oppgavesett->id !!}/"><span class="fa fa-bar-chart"></span> </a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
