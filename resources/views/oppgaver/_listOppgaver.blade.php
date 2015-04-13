<div class="list-group panel panel-primary" role="tablist" aria-multiselectable="true">
    <div class="panel-heading">
        <div class=" row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-1">
                        <input type="checkbox">
                    </div>
                    <div class="col-sm-11">
                        <b>Beskrivelse:</b>
                    </div>
                </div>
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
            <div class="col-sm-1">

            </div>
        </div>
    </div>

    @foreach($oppgaver as $oppgave)

        <div class="list-group-item">
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox">
                        </div>
                        <div class="col-sm-11">
                            <span class="visible-xs-inline">Beskrivelse: </span>
                            {{ $oppgave->beskrivelse }}
                        </div>
                    </div>
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
                <div class="col-sm-2">
                    <div class="btn-group pull-right">
                        <a href="{{ URL::route('bilagsmalsekvenser.show', $oppgave) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Vis oppgavesett">
                            <span class="fa fa-eye"></span>
                        </a>
                        <a href="{{ URL::route('bilagsmalsekvenser.edit', $oppgave) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Rediger oppgavesett">
                            <span class="fa fa-pencil-square-o"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @if(isset($kanOpprette) && $kanOpprette == true)
        <div class="list-group-item list-group-item-info ">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right">
                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til ny sekvens">
                            <span class="fa fa-plus"></span>
                        </a>
                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Importer eksisterende sekvens">
                            <span class="fa fa-upload"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>