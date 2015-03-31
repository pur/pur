@extends('pur')
@section('content')
    @include('besvarelser.testing._listSubmenu')
    <div class="container">
        <h1>Mine oppgavesett</h1>

        <div class="list-group panel panel-primary" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel-heading hidden-xs">
                <div class="row">
                    <div class="col-sm-2">
                        <b>Oppgave:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Fremdrift:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Status:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Frist:</b>
                    </div>
                    <div class="col-sm-2">
                        <b>Tid levert:</b>
                    </div>
                </div>
            </div>

            @foreach($besvarelser as $besvarelse)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Beskrivelse: </span>{{ $besvarelse->oppgavesett->beskrivelse}}
                        </div>

                        <div class="col-sm-2">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    60%
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Status: </span>{{ $besvarelse->oppgavesett->oppgaver()->count() }}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Frist: </span>{{ $besvarelse->oppgavesett->tidLukket() }}
                        </div>
                        <div class="col-sm-2">
                            <span class="visible-xs-inline">Tid levert: </span>{{ $besvarelse->tidLevert() }}
                        </div>
                        <div class="col-sm-2">
                            <div class="btn-group pull-right">
                                @if($besvarelse->tidLevert() == null)
                                    <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Fortsett oppgave">
                                        <span class="fa fa-play-circle"></span>
                                    </a>
                                @endif
                                <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis besvarelse">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger besvarelse">
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
