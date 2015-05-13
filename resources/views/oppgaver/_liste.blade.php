@if($oppgaver->count() > 0)
    <div class="list-group panel panel-primary" role="tablist" aria-multiselectable="true">
        <div class="panel-heading hidden-xs">
            <div class=" row">
                <div class="col-sm-4">
                    <b>Beskrivelse:</b>
                </div>
                <div class="col-sm-2">
                    <b>Laget av:</b>
                </div>
                <div class="col-sm-2">
                    <b>Opprettet:</b>
                </div>
                <div class="col-sm-2">
                    <b>Sist endret:</b>
                </div>
                <div class="col-sm-2 actions">
                    <b>Handlinger:</b>
                </div>
            </div>
        </div>

        @foreach($oppgaver as $oppgave)

            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-4">
                                <span class="visible-xs-inline">Beskrivelse: </span>
                                {{ $oppgave->beskrivelse }}
                    </div>
                    <div class="col-sm-2">
                        <span class="visible-xs-inline">Laget av: </span>
                        {{ $oppgave->skaper->fulltNavn() }}
                    </div>
                    <div class="col-sm-2">
                        <span class="visible-xs-inline">Opprettet: </span>
                        {{ $oppgave->tidOpprettet() }}
                    </div>
                    <div class="col-sm-2">
                        <span class="visible-xs-inline">Sist endret: </span>
                        {{ $oppgave->tidEndret() }}
                    </div>
                    <div class="col-sm-2 actions">
                        <div class="pull-right">
                            <a href="{{ URL::route('bilagsmalsekvenser.edit', $oppgave) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger oppgave">
                                <span class="fa fa-pencil-square-o"></span>
                            </a>
                            @if(isset($kanOpprette) && $kanOpprette == true)
                                <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Fjern oppgave fra oppgavesett">
                                    <span class="fa fa-trash"></span>
                                </a>
                                @else
                                <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Slett oppgave">
                                    <span class="fa fa-trash"></span>
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        @if(isset($kanOpprette) && $kanOpprette == true)
            <div class="list-group-item list-group-item-info ">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right">
                            <a class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til ny oppgave">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endif